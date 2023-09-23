<?php

namespace App\Http\Controllers;

use App\Events\NewUserRegisteredEvent;
use App\Mail\ContactFormMail;
use App\Models\Course;
use App\Models\SalesRep;
use App\Models\SalesWallet;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Contact;
use App\Models\ProfilePicture;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Password;
use Illuminate\Foundation\Auth\ResetsPasswords;
use App\Models\WalletStatement;
use Stevebauman\Location\Facades\Location;
use Unicodeveloper\Paystack\Facades\Paystack;


class HomeController extends Controller
{
    //

    public function checkout()
    {
        $selectedCourseId = request()->query('course_id');
        $selectedCourse = Course::find($selectedCourseId);
        return view('wcheck', compact('selectedCourse'));
    }

    public function showSubscriptionForm()
    {
        return view('test_subscribe');
    }

    public function createSubscription(Request $request)
    {
        $planResponse = Http::withHeaders([
            'Authorization' => 'Bearer sk_test_9c03c16a8a26ed4a1d881df3a88e3ca88fd690b1',
            'Content-Type' => 'application/json',
        ])->post('https://api.paystack.co/plan', [
            'name' => 'Monthly Retainer',
            'interval' => 'monthly',
            'amount' => $request->input('amount')/3, // Amount in kobo
        ]);

        $planData = $planResponse->json();
        $planCode = $planData['data']['plan_code'];

        $paymentPopupHtml = $this->initiatePayment($request->input('email'), $request->input('amount'), $planCode);


        // Send request to payment gateway API and receive response
    $paymentGatewayResponse = $this->sendPaymentRequestToGateway($request); // Implement this function

    // Check if payment was successful based on the response from the payment gateway
    if ($paymentGatewayResponse['status'] === 'success') {
        $this->registerUser($request); // Save user details into the database
    }

        return response()->json(['status' => 'success', 'paymentPopupHtml' => $paymentPopupHtml]);

    }

    private function sendPaymentRequestToGateway($request)
    {
        // Replace this with actual API request code to Paystack
        // You'll use your preferred HTTP library or method to send a request to the payment gateway
        // The response will contain information about the payment status
        $paymentUrl = "https://api.paystack.co/transaction/verify/{$request->reference}";

        $headers = [
            "Authorization" => "Bearer sk_test_9c03c16a8a26ed4a1d881df3a88e3ca88fd690b1",
            "Cache-Control" => "no-cache",
            "Content-Type" => "application/json",
        ];

        $response = Http::withHeaders($headers)->get($paymentUrl);

        if ($response->successful()) {
            $responseData = $response->json();
            return $responseData; // The payment status and other relevant data will be in the response
        } else {
            // Handle payment verification error
            return [
                'status' => 'error',
                'message' => 'Error verifying payment',
            ];
        }
    }

    private function initiatePayment($email, $amount, $planCode)
    {
        $paymentUrl = "https://api.paystack.co/transaction/initialize";

        $fields = [
            'email' => $email,
            'amount' => $amount/3, // Convert to kobo
            'plan' => $planCode,
        ];

        $headers = [
            "Authorization" => "Bearer sk_test_9c03c16a8a26ed4a1d881df3a88e3ca88fd690b1",
            "Cache-Control" => "no-cache",
            "Content-Type" => "application/json",
        ];

        $response = Http::withHeaders($headers)->post($paymentUrl, $fields);

        if ($response->successful()) {
            $responseData = $response->json();
            $authorizationUrl = $responseData['data']['authorization_url'];

            // Return a link for the user to complete payment
            return '<a href="' . $authorizationUrl . '" target="_blank">Click here to complete payment</a>';
        } else {
            // Handle payment initiation error
            return "Error initiating payment";
        }
    }

    private function registerUser(Request $request)
    {
        // Validate the registration form fields
        // Validate the registration form fields
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'service' => 'required',
        ]);

        // Get the last user with usertype = user
        $lastUser = User::where('usertype', 'user')->latest()->first();

        // Extract the serial number digits from the last user's serial number
        $lastSerialNumber = $lastUser ? intval(str_replace('SN-', '', $lastUser->serial_number)) : 0;

        // Increment the serial number
        $newSerialNumber = 'SN-' . ($lastSerialNumber + 1);
        $check_id = $lastSerialNumber + 1;
        $paid = 'paid';
        $enrollment_status = 2;
        // Create a new user record
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'phone_number' => $request->phone_number,
            'service' => $request->service,
            'serial_number' => $newSerialNumber,
            'payment_status' => $paid,
            'enrollment_status' => $enrollment_status,
            'check_id' => $check_id,
        ]);
        // $user->save();


        // Trigger the Pusher event after saving the user
        event(new NewUserRegisteredEvent($validatedData['name']));

        // Mail::to($user->email)->send(new SerialNumberNotification($user->serial_number,$user->name));




        if ($user instanceof MustVerifyEmail && !$user->hasVerifiedEmail()) {

            //     $user->sendEmailVerificationNotification();

            //     return redirect()->route('verification.notice');

            // Send email notification with the serial number and verification URL
            $user->sendEmailVerificationNotification();
        }




        // Redirect the user to the desired location
        return redirect()->route('login');
    }
    public function welcome(){
       // Array of course IDs
    $courseIds = [3, 5, 6,7,8];

    // Retrieve course objects based on the array of IDs
    $courses = Course::whereIn('id', $courseIds)->get();
        return view('welcomepage', compact('courses'));
    }

    public function allcourses(){
        $courses = Course::paginate(10);
        return view('allcourseview', compact('courses'));
    }


    public function contact(){
        $courses = Course::all();
        return view('contact', compact('courses'));
    }

    public function contactSubmit(Request $request)
    {
        // Validate the form data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'country' => 'required',
            'phone_number' => 'required|string',
            'message' => 'required|string',
            'program' => 'required|string',
        ]);

        // Process the form data
        $name = $request->input('name');
        $email = $request->input('email');
        $country = $request->input('country');
        $phone_number = $request->input('phone_number');
        $program = $request->input('program');
        $contactMessage  = $request->input('message');


        // You can send an email with the form data
        Mail::to('support@lern.africa')->send(new ContactFormMail($name, $email, $country, $phone_number, $program, $contactMessage ));

        // Once the form data is processed, you can redirect back to the contact page with a success message.
        return redirect()->route('contactUs')->with('success', 'Thank you for your message. We will get back to you soon!');
    }

    public function header(){
        $courses = Course::all();
        return view('homepageheader', compact('courses'));
    }

    public function searchCourse(Request $request)
    {
        $searchQuery = $request->input('query');
        $courses = Course::where('course_name', 'like', "%$searchQuery%")->get();

        return view('welcomesearch', compact('courses', 'searchQuery'));
    }

    public function viewCourse($id){

        $course = Course::findOrFail($id);

        // If the course with the given ID doesn't exist, redirect back with an error message
        if (!$course) {
            return redirect()->back()->with('error', 'Course not found.');
        }
        return view('welcomecoursedetails', compact('course'));
    }

    public function updateSubAmount(Request $request)
    {
        // Get the user ID or other identifier from the request
        $userId = $request->input('user_id'); // Replace with actual field name

        // Get the payment amount from the Paystack response
        $paymentAmount = $request->input('amount');

        // Get the current sub_amount for the user's course
        $course = User::find($userId);
        $currentSubAmount = $course->sub_amount;

        // Update the sub_amount by adding the new payment amount
        $newSubAmount = ceil($currentSubAmount) + $paymentAmount;
         // Or however you retrieve the user model
        $course->sub_amount = $newSubAmount;
        $course->save();
        Log::info('Sub_amount updated', ['user_id' => $userId, 'new_sub_amount' => $newSubAmount]);
        // return response()->json(['status' => 'success']);
    }

    public function index()
    {
        $WalletAmountGross = 0;
        $commissionPercentage = 0 ;

        if (Auth::id()) {
            $usertype = Auth::user()->usertype;

            if ($usertype == 'user') {
                // Retrieve the authenticated user
                $user = Auth::user();

                $check = $user->check_id;
                // retrieve the course details of the user
                $course = $user->service;
                $courseDetails = Course::where('id', $course)->get();


                // $serial_number = $user->serial_number;
                // $digit = intval(substr($serial_number, -1));

                foreach ($courseDetails as $course) {
                // $course_logo = $course->course_logo;
                // $course_name = $course->course_name;

                $courseTuition = $course->tuition_fee;
                $Sub_amount = Auth::User()->sub_amount;
                if($Sub_amount < $courseTuition){
                    $Sub_balance = $courseTuition - $Sub_amount;
                }else{
                    $Sub_balance = 0;
                }

                }
                // $about_course = $course->about_course;
                // $profile_picture = $course->profilePicture;
                // $course_syllabus = $course->course_syllabus;
                // }



                $contactCount = $user->contacts()->count();



                // $contactCountDate = Contact::where('created_at', '>', $user->created_at)->count();
                $userCountDate = User::where('created_at', '>', $user->created_at)->count();

                $totalCount = $userCountDate;

                $userCount = User::where('usertype', 'user')
                ->count();
                // Assuming you have a variable $value that represents the user's value
                $totalCount = User::where('usertype', 'user')
                    ->where('check_id', '>', $check)
                    ->count();

                // $totalCount = $userCountDate;

                // Assuming you have a variable $value that represents the user's value


                // $sequence = [4, 16, 64, 256, 1024, 4096, 16384, 65536];
                $level = 0;


                $N = Auth::id();
                // $level = 0;
                // $commissionPercentage = 0;


                $ipAddress = '102.89.46.250';
                // $ipAddress = request()->ip();
                $location = Location::get($ipAddress);


                $countryCode = $location->countryCode;

                $Rate = 1 / 777.58;


                if ($countryCode === 'NG') {
                    $pay = $courseTuition;
                } else {
                    $pay = $courseTuition * $Rate;
                }

                if ($totalCount == 0 && $totalCount < ($check * 4 + 1)) {
                    $level = 0;
                    $commissionPercentage = 0;
                    $WalletAmountGross = $pay * ($commissionPercentage / 100);
                } elseif ($totalCount >= ($check * 4 + 1) && $totalCount < ($check * 16 + 5)) {
                    $level = 1;
                    $commissionPercentage = 10;
                    $WalletAmountGross = ($pay * ($commissionPercentage / 100)) * 4;
                } elseif ($totalCount >= ($check * 16 + 5) && $totalCount < ($check * 64 + 21)) {
                    $level = 2;
                    $commissionPercentage = 8;
                    $WalletAmountGross = ($pay * ($commissionPercentage / 100)) * 16;
                } elseif ($totalCount >= ($check * 64 + 21) && $totalCount < ($check * 256 + 85)) {
                    $level = 3;
                    $commissionPercentage = 6;
                    $WalletAmountGross = ($pay * ($commissionPercentage / 100)) * 64;
                } elseif ($totalCount >= ($check * 256 + 85)) {
                    $level = 4;
                    $commissionPercentage = 4;
                    $WalletAmountGross = ($pay * ($commissionPercentage / 100)) * 256;
                }




                // Get the total withdraw request count
                $totalWithdrawRequests = WalletStatement::where('user_id', $user->id)
                    ->where('type', 'withdrawal')->count();

                $paymentStatus = WalletStatement::where('user_id', $user->id)
                    ->where('type', 'withdrawal')
                    ->where('payment_status', 'paid')
                    ->sum('amount');

                // Check if the payment status is verified
                if ($paymentStatus > 0) {
                    if ($countryCode === 'NG') {
                        $WalletAmount = $WalletAmountGross - $paymentStatus;
                    } else {
                        $WalletAmount = $WalletAmountGross - ($paymentStatus * $Rate);
                    }
                } else {

                    $WalletAmount = $WalletAmountGross;
                }

                // Get the total withdraw request count
                $totalWithdrawRequests = WalletStatement::where('user_id', $user->id)
                    ->where('type', 'withdrawal')->count();



                // Check if the payment status is verified



                $user->level = $level;
                $user->wallet_amount = $WalletAmount;
                $user->commission_status = 'pending';
                $user->commission_percentage = $commissionPercentage;
                $user->save();


                //Retrieve User Service from Database
                $service = $user->service;
                $serial_number = $user->serial_number;
                $enrollment_status = $user->enrollment_status;



                return view('dashboard', compact('courseDetails', 'totalCount', 'Sub_balance', 'Sub_amount', 'contactCount', 'totalCount', 'course', 'userCount', 'totalCount', 'WalletAmount', 'commissionPercentage', 'level', 'service', 'serial_number', 'enrollment_status'));
            } elseif ($usertype == 'admin') {
                $totalUsers = User::where('usertype', 'user')->count();
                $totalContacts = Contact::count();
                $totalSalesReps = SalesRep::count();

                // Pass the chart data and total counts to the view
                return view('admindash', compact('totalUsers', 'totalContacts', 'totalSalesReps'));
            } elseif ($usertype == 'subadmin') {
                $totalUsers = User::where('usertype', 'user')->count();
                $totalContacts = Contact::count();
                $totalSalesReps = SalesRep::count();

                // Pass the chart data and total counts to the view
                return view('admindash', compact('totalUsers', 'totalContacts', 'totalSalesReps'));
            } elseif ($usertype == 'salesrep') {
                $totalUsers = User::where('sales_id', Auth::user()->id)->count();
                $totalUsersPay = User::where('sales_id', Auth::user()->id)
                    ->where('payment_status', 'paid')
                    ->count();

                $Contacts = Contact::all()->count();
                $totalContacts = Contact::where('sales_id', Auth::user()->id)->count();
                $totalSalesReps = SalesRep::count();
                $convertedUsers = User::where('sales_id', Auth::user()->id)->count();
                $user = Auth::user();


                $pay = 100000;



                $commissionPercentage = $user->commission_percentage;
                $WalletAmountGross = ($pay * ($commissionPercentage / 100)) * $totalUsers;



                // Get the total withdraw request count
                $totalWithdrawRequests = SalesWallet::where('user_id', $user->id)
                    ->where('type', 'withdrawal')->count();

                $paymentStatus = SalesWallet::where('user_id', $user->id)
                    ->where('type', 'withdrawal')
                    ->where('payment_status', 'Paid')
                    ->sum('amount');


                // Check if the payment status is verified
                if ($paymentStatus > 0) {
                    $WalletAmount = $WalletAmountGross - $paymentStatus;
                } else {

                    $WalletAmount = $WalletAmountGross;
                }



                $user->wallet_amount = $WalletAmount;
                $user->commission_status = 'pending';
                $user->save();

                return view('salesdash', compact('totalUsers', 'totalContacts', 'convertedUsers', 'Contacts', 'WalletAmount'));
            } else {
                return redirect()->back();
            }
        }
    }


}
