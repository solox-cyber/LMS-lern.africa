<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use App\Imports\UsersImport;
use App\Mail\InvitesMail;
use App\Mail\ContactMail;
use App\Mail\WelcomeEmail;
use App\Models\BannerPicture;
use App\Models\Course;
use App\Models\CourseSubtopic;
use App\Models\SyllabusTitle;
use App\Models\Video;
use Stevebauman\Location\Facades\Location;
use Torann\GeoIP\GeoIP;
use Torann\GeoIP\Services\IPApi;
use App\Models\SalesRep;
use Carbon\Carbon;
use App\Models\Contact;
use App\Models\User;
use App\Mail\ReactivationEmail;
use Illuminate\Support\Facades\View;
use App\Models\ProfilePicture;
use App\Models\SalesWallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Password;
use Illuminate\Foundation\Auth\ResetsPasswords;
use App\Models\WalletStatement;
use Maatwebsite\Excel\Facades\Excel;
use App\Mail\EmailVerification;
use App\Models\PendingUser;
use Illuminate\Contracts\Auth\MustVerifyEmail;

class DashboardController extends Controller
{
    //
    use ResetsPasswords;

    protected $redirectTo = '/dashboard';
    public function index()
    {

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
                    if ($Sub_amount != $courseTuition) {
                        $Sub_balance = $courseTuition - ceil($Sub_amount);
                    } else {
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

                // $totalCount = $userCountDate;

                $WalletAmountGross = 0;
                $commissionPercentage = 0;
                $level = 0;


                // $totalCount = $userCountDate;

                // Assuming you have a variable $value that represents the user's value


                // $sequence = [4, 16, 64, 256, 1024, 4096, 16384, 65536];



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


                $userCount = User::where('usertype', 'user')
                    ->count();
                // Assuming you have a variable $value that represents the user's value
                $totalCount = User::where('usertype', 'user')
                    ->where('check_id', '>', $check)
                    ->count();

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

    public function importUsers()
    {
        Excel::import(new UsersImport, request()->file('file'));
        return redirect()->back();
    }

    public function admindelete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->back()->with('success', 'Admin User deleted successfully.');
    }

    public function adminlist()
    {
        $users = User::where('usertype', 'subadmin')->paginate(10); // Change 10 to the desired number of users per page
        return view('admin.admin-list', compact('users'));
    }


    public function admincreate()
    {
        return view('admin.admin-create');
    }



    public function adminstore(Request $request)
    {
        try {
            // Validate the form input
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8|confirmed',
                'upline' => 'required|string',
            ]);

            // Create a new admin user
            $user = User::create([
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'password' => bcrypt($validatedData['password']),
                'upline' => $validatedData['upline'],
            ]);

            // Update the user's usertype to "admin"
            $user->usertype = 'subadmin';
            $user->save();

            // Redirect to the admin list page or any other appropriate page
            return redirect()->route('admin.list')->with('success', 'Admin created successfully.');
        } catch (\Exception $e) {
            // Handle the exception and return an error message
            return redirect()->back()->withErrors(['error' => 'An error occurred. Please try again later.']);
        }
    }



    public function status_paid($id)
    {
        $walletStatement = WalletStatement::findOrFail($id);
        $walletStatement->payment_status = 'Paid';
        $walletStatement->save();

        return redirect()->back()->with('success', 'Payment status updated successfully.');
    }


    public function status_decline($id)
    {
        $walletStatement = WalletStatement::findOrFail($id);
        $walletStatement->payment_status = 'Decline';
        $walletStatement->save();

        return redirect()->back()->with('success', 'Payment status updated successfully.');
    }

    public function status_inprogress($id)
    {
        $walletStatement = WalletStatement::findOrFail($id);
        $walletStatement->payment_status = 'In Progress';
        $walletStatement->save();

        return redirect()->back()->with('success', 'Payment status updated successfully.');
    }


    public function salesstatus_paid($id)
    {
        $walletStatement = SalesWallet::findOrFail($id);
        $walletStatement->payment_status = 'Paid';
        $walletStatement->save();

        return redirect()->back()->with('success', 'Payment status updated successfully.');
    }


    public function salesstatus_decline($id)
    {
        $walletStatement = SalesWallet::findOrFail($id);
        $walletStatement->payment_status = 'Decline';
        $walletStatement->save();

        return redirect()->back()->with('success', 'Payment status updated successfully.');
    }

    public function salesstatus_inprogress($id)
    {
        $walletStatement = SalesWallet::findOrFail($id);
        $walletStatement->payment_status = 'In Progress';
        $walletStatement->save();

        return redirect()->back()->with('success', 'Payment status updated successfully.');
    }


    public function exportUsers()
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }

    public function paymentsuccess()
    {
        // Perform any necessary logic or database updates here
        // Retrieve the authenticated user
        $user = Auth::user();

        // Update the payment_status to 'paid'
        $user->payment_status = 'paid';
        $user->save();
        // Return the view for the success page
        return redirect()->back()->with('success', 'Payment successful!');
    }

    public function commission($id)
    {

        if (auth()->user()->usertype === 'admin' || auth()->user()->usertype === 'subadmin') {

            if (Auth::id()) {
                $usertype = Auth::user()->usertype;


                $user = Auth::user();


                // retrieve the course details of the user
                $course = $user->service;
                $courseDetails = Course::where('id', $course)->get();

                foreach ($courseDetails as $course) {
                    // $course_logo = $course->course_logo;
                    $course_name = $course->course_name;
                    $about_course = $course->about_course;
                    // $course_syllabus = $course->course_syllabus;
                }



                $contactCount = $user->contacts()->count();

                $userCount = User::where('usertype', 'user')->count();

                $course = $user->created_at;



                // $contactCountDate = Contact::where('created_at', '>', $user->created_at)->count();


                $totalCount = User::where('usertype', 'user')
                    ->where('id', '>', $user->id)
                    ->count();

                // $totalCount = $userCountDate;

                // Assuming you have a variable $value that represents the user's value


                // $sequence = [4, 16, 64, 256, 1024, 4096, 16384, 65536];
                $level = 0;


                $N = Auth::id();
                // $level = 0;
                // $commissionPercentage = 0;
                $pay = 100000;

                if ($totalCount == 0 && $totalCount < ($N * 4 + 1)) {
                    $level = 0;
                    $commissionPercentage = 0;
                    $WalletAmountGross = $pay * ($commissionPercentage / 100);
                } elseif ($totalCount >= ($N * 4 + 1) && $totalCount < ($N * 16 + 5)) {
                    $level = 1;
                    $commissionPercentage = 10;
                    $WalletAmountGross = ($pay * ($commissionPercentage / 100)) * 4;
                } elseif ($totalCount >= ($N * 16 + 5) && $totalCount < ($N * 64 + 21)) {
                    $level = 2;
                    $commissionPercentage = 8;
                    $WalletAmountGross = ($pay * ($commissionPercentage / 100)) * 16;
                } elseif ($totalCount >= ($N * 64 + 21) && $totalCount < ($N * 256 + 85)) {
                    $level = 3;
                    $commissionPercentage = 6;
                    $WalletAmountGross = ($pay * ($commissionPercentage / 100)) * 64;
                } elseif ($totalCount >= ($N * 256 + 85)) {
                    $level = 4;
                    $commissionPercentage = 4;
                    $WalletAmountGross = ($pay * ($commissionPercentage / 100)) * 256;
                }




                // Get the total withdraw request count
                $totalWithdrawRequests = WalletStatement::where('user_id', $user->id)
                    ->where('type', 'withdrawal')->count();

                $paymentStatus = WalletStatement::where('user_id', $user->id)
                    ->where('type', 'withdrawal')
                    ->where('payment_status', 'Paid')
                    ->sum('amount');

                // Check if the payment status is verified
                if ($paymentStatus > 0) {
                    $WalletAmount = $WalletAmountGross - $paymentStatus;
                } else {

                    $WalletAmount = $WalletAmountGross;
                }
            }


            $walletStatement = WalletStatement::find($id);
            $user = $walletStatement->user;
            return view('admin.commission', ['walletStatement' => $walletStatement, 'user' => $user], compact('WalletAmount', 'WalletAmountGross'));
        }

        // User is not an admin, redirect or show an error message
        return redirect()->back()->with('error', 'You do not have permission to access this page.');
    }


    public function salesViewCommission($id)
    {

        if (auth()->user()->usertype === 'admin' || auth()->user()->usertype === 'subadmin') {

            if (Auth::id()) {
                $usertype = Auth::user()->usertype;


                $user = Auth::user();


                // retrieve the course details of the user
                $course = $user->service;
                $courseDetails = Course::where('id', $course)->get();

                foreach ($courseDetails as $course) {
                    // $course_logo = $course->course_logo;
                    $course_name = $course->course_name;
                    $about_course = $course->about_course;
                    // $course_syllabus = $course->course_syllabus;
                }



                $contactCount = $user->contacts()->count();

                $userCount = User::where('usertype', 'user')->count();

                $course = $user->created_at;

                $tuitionFees = $user->service;
                $courseDetails = Course::where('id', $tuitionFees)->get();

                foreach ($courseDetails as $course) {

                    $courseTuition = $course->tuition_fee;
                }

                // $contactCountDate = Contact::where('created_at', '>', $user->created_at)->count();


                $totalCount = User::where('usertype', 'user')
                    ->where('id', '>', $user->id)
                    ->count();

                // $totalCount = $userCountDate;

                // Assuming you have a variable $value that represents the user's value


                // $sequence = [4, 16, 64, 256, 1024, 4096, 16384, 65536];
                $level = 0;


                $N = Auth::id();
                // $level = 0;
                // $commissionPercentage = 0;
                $pay = 100000;

                if ($totalCount == 0 && $totalCount < ($N * 4 + 1)) {
                    $level = 0;
                    $commissionPercentage = 0;
                    $WalletAmountGross = $pay * ($commissionPercentage / 100);
                } elseif ($totalCount >= ($N * 4 + 1) && $totalCount < ($N * 16 + 5)) {
                    $level = 1;
                    $commissionPercentage = 10;
                    $WalletAmountGross = ($pay * ($commissionPercentage / 100)) * 4;
                } elseif ($totalCount >= ($N * 16 + 5) && $totalCount < ($N * 64 + 21)) {
                    $level = 2;
                    $commissionPercentage = 8;
                    $WalletAmountGross = ($pay * ($commissionPercentage / 100)) * 16;
                } elseif ($totalCount >= ($N * 64 + 21) && $totalCount < ($N * 256 + 85)) {
                    $level = 3;
                    $commissionPercentage = 6;
                    $WalletAmountGross = ($pay * ($commissionPercentage / 100)) * 64;
                } elseif ($totalCount >= ($N * 256 + 85)) {
                    $level = 4;
                    $commissionPercentage = 4;
                    $WalletAmountGross = ($pay * ($commissionPercentage / 100)) * 256;
                }




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
            }


            $walletStatement = SalesWallet::find($id);
            $user = $walletStatement->user;
            return view('admin.viewsalescommission', ['walletStatement' => $walletStatement, 'user' => $user], compact('WalletAmount', 'WalletAmountGross'));
        }

        // User is not an admin, redirect or show an error message
        return redirect()->back()->with('error', 'You do not have permission to access this page.');
    }

    public function setcommissions()
    {
        $commissionPercentage = User::where('usertype', 'salesrep')->value('commission_percentage');

        return view('admin.set-commission', compact('commissionPercentage'));
    }


    public function updateCommissionPercentage(Request $request)
    {
        $commissionPercentage = $request->input('commission_percentage');

        User::where('usertype', 'salesrep')->update(['commission_percentage' => $commissionPercentage]);

        return redirect()->back()->with('success', 'Commission percentage updated successfully.');
    }

    public function commissions()
    {
        if (auth()->user()->usertype === 'admin' || auth()->user()->usertype === 'subadmin') {

            $walletStatements = WalletStatement::with('user')->paginate(10);

            return view('admin.commission-list', ['walletStatements' => $walletStatements]);
        }

        // User is not an admin, redirect or show an error message
        return redirect()->back()->with('error', 'You do not have permission to access this page.');
    }

    public function activated(Request $request, $token)
    {
        $user = User::where('activation_token', $token)->first();

        if ($user) {
            $user->payment_status = 'pending';
            $user->deactivated_at = null;
            $user->save();

            // Optionally, you can log in the user programmatically
            // auth()->login($user);

            // Generate the activation URL with the correct domain
            // $activationUrl = url('/activate/' . $token);

            // return redirect()->away($activationUrl);
            return view('activated_success');
        }

        abort(404);
    }


    public function salescommissions()
    {
        if (auth()->user()->usertype === 'admin' || auth()->user()->usertype === 'subadmin') {

            if (Auth::id()) {
                $usertype = Auth::user()->usertype;


                $user = Auth::user();


                $contactCount = $user->contacts()->count();

                $userCount = User::count();
            }


            $walletStatements = SalesWallet::with('user')->paginate(10);

            return view('admin.salescommission-list', ['walletStatements' => $walletStatements]);
        }

        // User is not an admin, redirect or show an error message
        return redirect()->back()->with('error', 'You do not have permission to access this page.');
    }

    public function CourseDestroy($id)
    {
        if (auth()->user()->usertype === 'admin' || auth()->user()->usertype === 'subadmin') {
            try {
                $course = Course::findOrFail($id);
                $course->delete();
                return redirect()->route('course.list')->with('success', 'Course deleted successfully.');
            } catch (\Exception $e) {
                return redirect()->back()->withErrors(['error' => 'An error occurred. Please try again later.']);
            }
        }
    }


    public function salesDestroy($id)
    {
        // Find the sales rep by ID
        $salesRep = User::where('usertype', 'salesrep')->findOrFail($id);

        // Delete the sales rep
        $salesRep->delete();

        // Redirect or return a response as needed
        return redirect()->back()->with('success', 'Sales rep deleted successfully');
    }

    public function salesView()
    {
        $salesReps = User::where('usertype', 'salesrep')->paginate(10); // Change the page size (10) as per your requirement
        $assignedContactsCount = 0;
        foreach ($salesReps as $salesRep) {
            $assignedContactsCount = Contact::where('sales_id', $salesRep->id)->count();
            $salesRep->assignedContactsCount = $assignedContactsCount;
        }

        return view('admin.salesrep-list', compact('salesReps', 'assignedContactsCount'));
    }



    public function assignContact(Request $request, $salesRepId, $contactId)
    {
        // Validate the request data
        $request->validate([
            'contact_id' => 'required|exists:contacts,id',
        ]);


        // Find the contact and update the sales_rep_id
        $contact = Contact::find($contactId);
        $contact->sales_rep_id = $salesRepId;
        $contact->save();

        // Redirect or return a response as needed
        return redirect()->back()->with('success', 'Contact assigned successfully');
    }

    public function allCourses()
    {

        $courses = Course::paginate(10);

        return view('courses', compact('courses'));
    }

    public function Coursedetails($id)
    {
        $course = Course::findOrFail($id); // Retrieve the course based on the ID

        return view('coursedetails', compact('course')); // Pass the course data to the view
    }


    public function myCourses()
    {
        $user = Auth::user();

        $course = $user->service;
        $courses = Course::where('id', $course)->paginate(10);

        return view('mycourses', compact('courses')); // Pass the courses data to the view
    }


    public function salessearch(Request $request)
    {
        // Get the authenticated user
        $user = auth()->user();

        // Get the search keywords from the request
        $searchKeywords = $request->input('search');

        // Perform the search query using the search keywords and the user's contacts
        $contacts = $user->contacts()
            ->where('name', 'LIKE', "%{$searchKeywords}%")
            ->get();

        // Return the search results as JSON response
        return response()->json($contacts);
    }


    // public function courseShow($id)
    // {
    //     if (auth()->user()->usertype === 'admin') {
    //         $salesReps = SalesRep::all();
    //         $salesRep = SalesRep::findOrFail($id);
    //         $numberOfContacts = $salesRep->contacts()->count();
    //         $salescontacts = $salesRep->contacts()->get();
    //         $contacts = Contact::all();
    //         return view('admin.course-edit', compact('salesRep', 'salesReps', 'numberOfContacts', 'salescontacts', 'contacts'));
    //     }
    // }

    public function courseShow($id)
    {
        if (auth()->user()->usertype === 'admin' || auth()->user()->usertype === 'subadmin') {
            $courses = Course::findOrFail($id);
            return view('admin.course-edit', compact('courses'));
        }
    }

    public function salesShow($id)
    {
        $salesReps = User::where('usertype', 'salesrep')->get();
        $salesRep = User::findOrFail($id);
        $numberOfContacts = $salesRep->contacts()->count();
        $salescontacts = $salesRep->contacts()->get();
        $contacts = Contact::all();
        return view('admin.salesrep', compact('salesRep', 'salesReps', 'numberOfContacts', 'salescontacts', 'contacts'));
    }
    public function salesStore(Request $request)
    {
        if (auth()->user()->usertype === 'admin' || auth()->user()->usertype === 'subadmin') {
            $validatedData = $request->validate([
                'name' => 'required',
                'email' => 'required|email',
                'phone_number' => 'required',
                'country' => 'required',
            ]);

            // Add a default password value
            $validatedData['password'] = bcrypt('password');

            $user = User::create($validatedData);

            // Update the user's usertype to "salesrep"
            $user->usertype = 'salesrep';
            $user->upline = $request->input('role');
            $user->email_verified_at = Carbon::now();
            $user->save();
            // Redirect or perform any other actions after storing the sales representative

            Mail::to($user->email)->send(new WelcomeEmail($user, 'password'));

            return redirect()->route('admin.salesrep')->with('success', 'Sales representative created successfully');
        }
    }


    public function userStore(Request $request)
    {
        if (auth()->user()->usertype === 'admin' || auth()->user()->usertype === 'subadmin') {
            $validatedData = $request->validate([
                'name' => 'required',
                'email' => 'required|email',
                'phone_number' => 'required',
                'sub_amount' => 'required',
            ]);

            // Get the last user with usertype = user
            $lastUser = User::where('usertype', 'user')->latest()->first();

            // Extract the serial number digits from the last user's serial number
            $lastSerialNumber = $lastUser ? intval(str_replace('SN-', '', $lastUser->serial_number)) : 0;

            // Increment the serial number
            $newSerialNumber = 'SN-' . ($lastSerialNumber + 1);
            $check_id = $lastSerialNumber + 1;
            $paid = 'paid';
            $enrollment_status = 1;

            // Add a default password value
            $validatedData['password'] = bcrypt('password');

            $user = User::create($validatedData);

            // Update the user's usertype to "salesrep"
            $user->usertype = 'user';
            $user->serial_number = $newSerialNumber;
            $user->payment_status = $paid;
            $user->enrollment_status = $enrollment_status;
            $user->check_id = $check_id;
            $user->service = $request->service;
            $user->upline = 'admin';
            $user->email_verified_at = Carbon::now();
            $user->save();
            // Redirect or perform any other actions after storing the sales representative

            Mail::to($user->email)->send(new WelcomeEmail($user, 'password'));

            return redirect()->route('pcusers')->with('success', 'User created successfully');
        }
    }


    public function salesAdd()
    {
        return view('admin.add-salesrep');
    }

    public function PCadd()
    {
        $courses = Course::all();
        return view('admin.add-pcusers', compact('courses'));
    }

    public function showEmail()
    {
        return view('changeEmail');
    }

    public function salesShowEmail()
    {
        return view('saleschangeEmail');
    }

    public function LiveStream()
    {
        $courses = Course::all();
        return view('livestream', compact('courses'));
    }

    public function LiveStreambyid($courseid)
    {
        // Retrieve the course with the specified ID
        $course = Course::find($courseid);

        // Check if the course exists
        if (!$course) {
            abort(404); // Or handle the case where the course is not found
        }

        return view('livestream', compact('course'));
    }

    public function userview($id)
    {
        // Retrieve the user from the database based on the provided ID
        $user = User::find($id);

        // retrieve the course details of the user
        $course = $user->service;
        $courseDetails = Course::where('id', $course)->get();

        foreach ($courseDetails as $course) {

            $course_name = $course->course_name;
        }
        return view('admin.users-view', compact('user', 'course_name'));
    }



    public function pendinguserview($id)
    {
        // Retrieve the user from the database based on the provided ID
        $user = PendingUser::find($id);

        // retrieve the course details of the user
        $course = $user->service;
        $courseDetails = Course::where('id', $course)->get();

        foreach ($courseDetails as $course) {

            $course_name = $course->course_name;
        }
        return view('admin.pendingusers-view', compact('user', 'course_name'));
    }




    public function userlist()
    {

        if (auth()->user()->usertype === 'admin' || auth()->user()->usertype === 'subadmin') {
            $contacts = User::where('usertype', 'user')->orWhere('usertype', 'deactivated')->paginate(10);;

            // Retrieve the course details for each user
            $courseDetails = [];

            foreach ($contacts as $user) {
                $sales = $user->sales_rep_id;
                $salesDetails[$user->id] = User::where('id', $sales)->first();

                // Retrieve the salesrep name if sales details exist
                $salesRepName = $salesDetails[$user->id] ? $salesDetails[$user->id]->name : null;
                $salesDetails[$user->id]['name'] = $salesRepName;


                $course = $user->service;
                $courseDetails[$user->id] = Course::where('id', $course)->first();

                // Retrieve the course name if course details exist
                $courseName = $courseDetails[$user->id] ? $courseDetails[$user->id]->course_name : null;
                $courseDetails[$user->id]['course_name'] = $courseName;
            }

            return view('admin.users-list', compact('contacts', 'courseDetails', 'salesDetails'));
        }




        // User is not an admin, redirect or show an error message
        return redirect()->back()->with('error', 'You do not have permission to access this page.');
    }

    public function pendinguserlists()
    {
        if (auth()->user()->usertype === 'salesrep') {
            $authUserId = Auth::id();
            $contacts = PendingUser::where('sales_id', $authUserId)->paginate(10);

            $courseDetails = [];
            $salesDetails = [];

            foreach ($contacts as $user) {
                $sales = $user->sales_rep_id;
                $salesDetails[$user->id] = PendingUser::where('id', $sales)->first();

                // Retrieve the salesrep name if sales details exist
                $salesRepName = $salesDetails[$user->id] ? $salesDetails[$user->id]->name : null;
                $salesDetails[$user->id]['name'] = $salesRepName;

                $course = $user->service;
                $courseDetails[$user->id] = Course::where('id', $course)->first();

                // Retrieve the course name if course details exist
                $courseName = $courseDetails[$user->id] ? $courseDetails[$user->id]->course_name : null;
                $courseDetails[$user->id]['course_name'] = $courseName;
            }

            return view('salesrep.pendingusers', compact('contacts', 'courseDetails', 'salesDetails'));
        }

        // User is not an admin, redirect or show an error message
        return redirect()->back()->with('error', 'You do not have permission to access this page.');
    }


    public function Puserlist()
    {
        if (auth()->user()->usertype === 'admin' || auth()->user()->usertype === 'subadmin') {
            $contacts = PendingUser::paginate(10);
            $salesReps = User::where('usertype', 'salesrep')->paginate(10);
            $courseDetails = [];
            $salesDetails = [];

            foreach ($contacts as $user) {
                $sales = $user->sales_id;
                $salesDetails[$user->id] = User::where('id', $sales)->first();

                // Retrieve the salesrep name if sales details exist
                $salesRepName = $salesDetails[$user->id] ? $salesDetails[$user->id]->name : null;
                $salesDetails[$user->id]['name'] = $salesRepName;

                $course = $user->service;
                $courseDetails[$user->id] = Course::where('id', $course)->first();

                // Retrieve the course name if course details exist
                $courseName = $courseDetails[$user->id] ? $courseDetails[$user->id]->course_name : null;
                $courseDetails[$user->id]['course_name'] = $courseName;
            }

            return view('admin.pendingusers-list', compact('contacts', 'courseDetails', 'salesDetails', 'salesReps'));
        }

        // User is not an admin, redirect or show an error message
        return redirect()->back()->with('error', 'You do not have permission to access this page.');
    }

    public function PCusers()
    {
        if (auth()->user()->usertype === 'admin' || auth()->user()->usertype === 'subadmin') {
            $contacts = User::where('upline', 'admin')->paginate(10);
            $salesReps = User::where('usertype', 'salesrep')->paginate(10);
            $courseDetails = [];
            $salesDetails = [];

            foreach ($contacts as $user) {
                $sales = $user->sales_id;
                $salesDetails[$user->id] = User::where('id', $sales)->first();

                // Retrieve the salesrep name if sales details exist
                $salesRepName = $salesDetails[$user->id] ? $salesDetails[$user->id]->name : null;
                $salesDetails[$user->id]['name'] = $salesRepName;

                $course = $user->service;
                $courseDetails[$user->id] = Course::where('id', $course)->first();

                // Retrieve the course name if course details exist
                $courseName = $courseDetails[$user->id] ? $courseDetails[$user->id]->course_name : null;
                $courseDetails[$user->id]['course_name'] = $courseName;
            }

            return view('admin.peculiar_users', compact('contacts', 'courseDetails', 'salesDetails', 'salesReps'));
        }

        // User is not an admin, redirect or show an error message
        return redirect()->back()->with('error', 'You do not have permission to access this page.');
    }

    public function sendpendinguserviewemail($salesId, $contactId)
    {
        // Retrieve the $contact object based on the $contactId
        $contact = PendingUser::findOrFail($contactId);

        // Get the user object based on the authenticated user (assuming it's the sales representative)
        $user = User::findOrFail($salesId);

        // Send the email to the user's email address with the contact ID and sales ID
        Mail::to($contact->email)->send(new ContactMail($contact, $contactId, $salesId));

        return redirect()->route('pendinguserlists')
            ->with('success', 'Email sent successfully.');
    }


    public function sendcontactsemail($salesId, $contactId)
    {
        try {
            // Retrieve the $contact object based on the $contact_id
            $contact = Contact::findOrFail($contactId);

            // Get the user object based on the authenticated user (assuming it's the sales representative)
            $user = User::findOrFail($salesId);

            // Send the email to the user's email address with the contact ID and sales ID
            Mail::to($contact->email)->send(new InvitesMail($user, $contactId, $salesId));

            return redirect()->route('invites.index')
                ->with('success', 'Email sent successfully.');
        } catch (\Exception $e) {
            // Catch any errors that occurred while sending the email
            return redirect()->route('invites.index')
                ->with('error', 'An error occurred while sending the email. Please try again later.');
        }
    }



    public function filterContacts(Request $request)
    {
        if (auth()->user()->usertype === 'admin' || auth()->user()->usertype === 'subadmin') {

            $linkedToSalesRep = $request->input('linked_to_sales_rep');

            // Perform the filter query for contacts
            $contacts = Contact::when($linkedToSalesRep, function ($query, $linkedToSalesRep) {
                if ($linkedToSalesRep === 'Assigned') {
                    $query->whereNotNull('sales_id');
                } elseif ($linkedToSalesRep === 'NAssigned') {
                    $query->whereNull('sales_id');
                }
            })->get();

            $salesReps = User::where('usertype', 'salesrep')->get();

            return view('admin.filtersearchcontacts', compact('contacts', 'salesReps'));
        }
    }

    public function filterUsers(Request $request)
    {

        if (auth()->user()->usertype === 'admin' || auth()->user()->usertype === 'subadmin') {

            $contacts = User::where('usertype', 'user')->orWhere('usertype', 'deactivated')->get();

            // Retrieve the course details for each user
            $courseDetails = [];

            foreach ($contacts as $user) {
                $sales = $user->sales_rep_id;
                $salesDetails[$user->id] = SalesRep::where('id', $sales)->first();

                // Retrieve the salesrep name if sales details exist
                $salesRepName = $salesDetails[$user->id] ? $salesDetails[$user->id]->name : null;
                $salesDetails[$user->id]['name'] = $salesRepName;


                $course = $user->service;
                $courseDetails[$user->id] = Course::where('id', $course)->first();

                // Retrieve the course name if course details exist
                $courseName = $courseDetails[$user->id] ? $courseDetails[$user->id]->course_name : null;
                $courseDetails[$user->id]['course_name'] = $courseName;
            }


            $paymentStatus = $request->input('payment_status');

            $query = User::query();

            if ($paymentStatus) {
                $query->where('payment_status', $paymentStatus);
            }

            $query->where('usertype', 'user');

            $users = $query->paginate(10);

            return view('admin.search-results', compact('users', 'courseDetails', 'salesDetails'));
        }
    }
    public function searchUsers(Request $request)
    {
        if (auth()->user()->usertype === 'admin' || auth()->user()->usertype === 'subadmin') {

            $contacts = User::where('usertype', 'user')->orWhere('usertype', 'deactivated')->get();

            // Retrieve the course details for each user
            $courseDetails = [];

            foreach ($contacts as $user) {
                $sales = $user->sales_rep_id;
                $salesDetails[$user->id] = SalesRep::where('id', $sales)->first();

                // Retrieve the salesrep name if sales details exist
                $salesRepName = $salesDetails[$user->id] ? $salesDetails[$user->id]->name : null;
                $salesDetails[$user->id]['name'] = $salesRepName;


                $course = $user->service;
                $courseDetails[$user->id] = Course::where('id', $course)->first();

                // Retrieve the course name if course details exist
                $courseName = $courseDetails[$user->id] ? $courseDetails[$user->id]->course_name : null;
                $courseDetails[$user->id]['course_name'] = $courseName;
            }

            $search = $request->input('search');

            $users = User::where('usertype', 'user')
                ->where(function ($query) use ($search) {
                    $query->where('name', 'like', "%$search%")
                        ->orWhere('email', 'like', "%$search%");
                })
                ->get();


            return view('admin.search-results', compact('users', 'courseDetails', 'salesDetails'));
        }
    }


    public function searchUsersList(Request $request)
    {
        if (auth()->user()->usertype === 'salesrep') {

            $contacts = PendingUser::get();

            // Retrieve the course details for each user
            $courseDetails = [];

            foreach ($contacts as $user) {

                $course = $user->service;
                $courseDetails[$user->id] = Course::where('id', $course)->first();

                // Retrieve the course name if course details exist
                $courseName = $courseDetails[$user->id] ? $courseDetails[$user->id]->course_name : null;
                $courseDetails[$user->id]['course_name'] = $courseName;
            }

            $search = $request->input('search');
            $authUserId = Auth::id();

            $users = PendingUser::where('sales_id', $authUserId)
                ->where(function ($query) use ($search) {
                    $query->where('name', 'like', "%$search%")
                        ->orWhere('email', 'like', "%$search%");
                })
                ->get();


            return view('salesrep.search-options', compact('users', 'courseDetails'));
        }
    }


    public function convert(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'email' => 'required|email',
                'service' => 'required',
            ]);

            // Retrieve additional details from the database based on the contact ID
            $contactId = $request->input('id');
            $contact = Contact::find($contactId);

            $salesId = $request->input('salesrep');
            $user = User::findOrFail($salesId);

            $name = $contact->name;
            if (!$contact) {
                // Handle the case when the contact is not found
                return redirect()->back()->with('error', 'Contact not found.');
            }

            // Update the contact details
            $contact->service = $request->input('service');
            $contact->email = $validatedData['email'];
            $contact->upline = $contact->user_id;

            // Save the updated contact details
            $contact->save();

            // Send the email to the user's email address with the contact ID and sales ID
            Mail::to($validatedData['email'])->send(new InvitesMail($contact, $contactId, $salesId));

            return redirect()->back()
                ->with('success', 'Email sent successfully.');
        } catch (\Exception $e) {
            // Catch any errors that occurred while sending the email
            return redirect()->back()
                ->with('error', 'An error occurred while sending the email. Please try again later.');
        }
    }


    public function searchContact(Request $request)
    {
        $salesReps = User::where('usertype', 'salesrep')->get();

        $search = $request->input('search');

        // Perform the search query for contacts
        $contacts = Contact::with('user')
            ->where(function ($query) use ($search) {
                $query->where('name', 'like', "%$search%");
            })
            ->get();

        return view('admin.contactsearch-results', compact('contacts', 'salesReps'));
    }


    public function updateStatus(Request $request)
    {
        // Get the authenticated user or use any other method to identify the user
        $user = auth()->user();

        // Update the payment status
        $user->payment_status = $request->input('status');
        $user->save();

        // Return a JSON response indicating the success of the update
        return response()->json(['message' => 'Payment status updated successfully']);
    }


    public function searchUser(Request $request)
    {
        $salesReps = User::where('usertype', 'salesrep')->paginate(10);

        $search = $request->input('search');

        // Perform the search query for contacts
        $contacts = PendingUser::with('user', 'salesRep')->where(function ($query) use ($search) {
            $query->where('name', 'like', "%$search%");
        })
            ->get();

        $contact = PendingUser::all();
        foreach ($contact as $user) {
            $sales = $user->sales_id;
            $salesDetails[$user->id] = User::where('id', $sales)->first();

            // Retrieve the salesrep name if sales details exist
            $salesRepName = $salesDetails[$user->id] ? $salesDetails[$user->id]->name : null;
            $salesDetails[$user->id]['name'] = $salesRepName;

            $course = $user->service;
            $courseDetails[$user->id] = Course::where('id', $course)->first();

            // Retrieve the course name if course details exist
            $courseName = $courseDetails[$user->id] ? $courseDetails[$user->id]->course_name : null;
            $courseDetails[$user->id]['course_name'] = $courseName;
        }

        return view('admin.pendingusers-list', compact('contacts', 'salesReps', 'courseDetails', 'salesDetails',));
    }


    public function searchInvite(Request $request)
    {
        $salesReps = User::where('usertype', 'salesrep')->paginate(10);

        $search = $request->input('search');

        // Perform the search query for contacts
        $contacts = Contact::with('user', 'salesRep')
            ->where(function ($query) use ($search) {
                $query->where('name', 'like', "%$search%");
            })
            ->get();

        return view('admin.invitations-result', compact('contacts', 'salesReps'));
    }


    public function searchSalesInvite(Request $request)
    {
        $salesReps = SalesRep::all();
        $userId = Auth::user()->id;

        $search = $request->input('search');

        // Perform the search query for contacts linked to the authenticated user
        $contacts = Contact::with('user', 'salesRep')
            ->where('sales_id', $userId)
            ->where(function ($query) use ($search) {
                $query->where('name', 'like', "%$search%");
            })
            ->get();

        return view('admin.contactsales-result', compact('contacts', 'salesReps'));
    }



    public function searchSales(Request $request)
    {
        $search = $request->input('search');

        // Perform the search query for sales representatives
        $salesReps = User::where(function ($query) use ($search) {
            $query->where('name', 'like', "%$search%")
                ->orWhere('email', 'like', "%$search%");
        })->where('usertype', 'salesrep')->get();

        foreach ($salesReps as $salesRep) {
            $assignedContactsCount = Contact::where('user_id', $salesRep->id)->count();
            $salesRep->assignedContactsCount = $assignedContactsCount;
        }

        $assignedContactsCount = $salesReps->sum('assignedContactsCount');

        return view('admin.salessearch-results', compact('salesReps', 'assignedContactsCount'));
    }





    public function userdelete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('userlist')->with('success', 'User deleted successfully.');
    }

    public function pendinguserdelete($id)
    {
        $user = PendingUser::findOrFail($id);
        $user->delete();


        return redirect()->route('Puserlist')->with('success', 'User deleted successfully.');
    }

    public function passwordReset(Request $request, $token = null)
    {

        // $user = Auth::user();
        // Retrieve the authenticated user
        $user = Auth::user();

        return view('resetpass', ['token' => $token, 'email' => $user->email]);
    }

    public function passwordStore(Request $request)
    {
        $request->validate([
            'password' => 'required|min:8|confirmed',
        ]);

        // $user = Auth::user();
        // Retrieve the authenticated user
        $user = Auth::user();

        $resetPasswordStatus = $this->broker()->reset(
            ['email' => $user->email, 'password' => $request->password, 'password_confirmation' => $request->password_confirmation],
            function ($user, $password) {
                $this->resetPassword($user, $password);
            }
        );

        if ($resetPasswordStatus == Password::PASSWORD_RESET) {
            return redirect()->route('dashboard')->with('status', trans($resetPasswordStatus));
        } else {
            return back()->withErrors(['password' => trans($resetPasswordStatus)]);
        }
    }

    protected function resetPassword($user, $password)
    {
        $user->password = Hash::make($password);
        $user->save();
        // You can perform any additional actions after the password reset if needed
    }

    protected function broker()
    {
        return Password::broker();
    }

    public function deletePeculiarContact($id)
    {
        if (auth()->user()->usertype === 'admin' || auth()->user()->usertype === 'subadmin') {
            try {
                $course = User::findOrFail($id);
                $course->delete();
                return redirect()->route('pcusers')->with('success', 'Course deleted successfully.');
            } catch (\Exception $e) {
                return redirect()->back()->withErrors(['error' => 'An error occurred. Please try again later.']);
            }
        }
    }



    public function updateEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email,' . Auth::id(),
        ]);

        // $user = Auth::user();
        // Retrieve the authenticated user
        $user = Auth::user();

        $user->email = $request->input('email');
        $user->save();

        return redirect()->back()->with('success', 'Email updated successfully.');
    }

    public function profile()
    {
        return view('overview');
    }

    public function adminprofile()
    {
        return view('admin.overview');
    }

    public function salesprofile()
    {
        return view('salesrep.overview');
    }
    public function salesPayoutGate(Request $request)
    {
        $user = Auth::user();

        // Get the amount from the request
        $amount = $request->input('amount');

        // Create a new WalletStatement instance
        $walletStatement = new SalesWallet();

        // Set the values for the columns
        $walletStatement->user_id = $user->id;
        $walletStatement->amount = $amount;
        $walletStatement->type = 'withdrawal'; // Enclose in single quotes to treat as a string
        $walletStatement->created_at = now();

        // Save the entry to the database
        $walletStatement->save();

        // Redirect to the dashboard or return a response
        return redirect()->back()->with('success', 'Withdrawal recorded successfully.');
    }

    public function payoutGate(Request $request)
    {
        // Retrieve the authenticated user
        // $user = Auth::user();

        $user = Auth::user();

        $ipAddress = '102.89.46.250';
        // $ipAddress = request()->ip();
        $location = Location::get($ipAddress);


        $countryCode = $location->countryCode;


        $Rate = 1 / 777.58;

        if ($countryCode === 'NG') {
            $currencySymbol = '₦';
        } else {
            $currencySymbol = '$';
        }
        // Get the amount from the request
        $amount = $request->input('amount');

        // Create a new WalletStatement instance
        $walletStatement = new WalletStatement();

        // Set the values for the columns
        $walletStatement->user_id = $user->id;
        $walletStatement->amount = $amount;
        $walletStatement->symbol = $currencySymbol;
        $walletStatement->type = 'withdrawal'; // Enclose in single quotes to treat as a string
        $walletStatement->created_at = now();

        // Save the entry to the database
        $walletStatement->save();

        // Redirect to the dashboard or return a response
        return redirect()->route('statement')->with('success', 'Withdrawal recorded successfully.');
    }
    public function statement()
    {
        $contactCount = Contact::count();
        $userCount = User::count();


        // $user = Auth::user();
        // Retrieve the authenticated user
        $user = Auth::user();

        // $WalletAmountGross = 0;
        $check = $user->check_id;
        // $contactCountDate = Contact::where('created_at', '>', $user->created_at)->count();
        $userCountDate = User::where('created_at', '>', $user->created_at)->count();

        $totalCount = $userCountDate;

        // Assuming you have a variable $value that represents the user's value
        $totalCount = User::where('usertype', 'user')
            ->where('check_id', '>', $check)
            ->count();

        // $totalCount = $userCountDate;

        // Assuming you have a variable $value that represents the user's value

        $tuitionFees = $user->service;
        $courseDetails = Course::where('id', $tuitionFees)->get();




        foreach ($courseDetails as $course) {

            $courseTuition = $course->tuition_fee;
        }


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

        $WalletAmountGross = 0;
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


        $user = Auth::user();
        $balance = $user->wallet_amount;

        $statements = WalletStatement::where('user_id', $user->id)->orderBy('created_at', 'desc')->get();

        return view('statement', compact('statements', 'WalletAmountGross', 'balance'));
    }


    public function salesstatement()
    {
        $contactCount = Contact::count();
        $userCount = User::count();


        // $user = Auth::user();
        // Retrieve the authenticated user
        $user = Auth::user();



        $pay = 100000;

        $totalUsers = User::where('sales_id', Auth::user()->id)->count();
        $totalUsersPay = User::where('sales_id', Auth::user()->id)
            ->where('payment_status', 'paid')
            ->count();
        $commissionPercentage = $user->commission_percentage;
        $WalletAmountGross = ($pay * ($commissionPercentage / 100)) * $totalUsersPay;



        // Get the total withdraw request count
        $totalWithdrawRequests = SalesWallet::where('user_id', $user->id)
            ->where('type', 'withdrawal')->count();

        $paymentStatus = SalesWallet::where('user_id', $user->id)
            ->where('type', 'withdrawal')
            ->where('payment_status', 'paid')
            ->sum('amount');

        // Check if the payment status is verified
        if ($paymentStatus > 0) {
            $WalletAmount = $WalletAmountGross - $paymentStatus;
        } else {

            $WalletAmount = $WalletAmountGross;
        }


        $balance = $user->wallet_amount;

        $statements = SalesWallet::where('user_id', $user->id)->orderBy('created_at', 'desc')->get();

        return view('salesstatement', compact('statements', 'WalletAmountGross', 'balance'));
    }

    public function payout()
    {
        // $user = Auth::user();
        // Retrieve the authenticated user
        $user = Auth::user();
        $email =   $user->email;
        $walletAmount = $user->wallet_amount;
        return view('withdraw', compact('email', 'walletAmount'));
    }

    public function salespayout()
    {
        // $user = Auth::user();
        // Retrieve the authenticated user
        $user = Auth::user();
        $email =   $user->email;
        $walletAmount = $user->wallet_amount;
        return view('payout', compact('email', 'walletAmount'));
    }

    public function setting()
    {
        return view('settings');
    }

    public function adminsetting()
    {
        return view('admin.settings');
    }

    public function salessetting()
    {
        return view('salesrep.settings');
    }

    public function AddContact()
    {
        // $user = Auth::user();
        // Retrieve the authenticated user
        $user = Auth::user();
        $contacts = $user->contacts;
        $count = $user->contacts()->count();
        return view('add-contact', compact('contacts'), compact('count'));
    }

    public function SalesAddContact()
    {
        // $user = Auth::user();
        // Retrieve the authenticated user
        $user = Auth::user();
        $contacts = $user->contacts;
        $count = $user->contacts()->count();
        return view('sales-addcontact', compact('contacts'), compact('count'));
    }


    public function allcontacts()
    {
        // $user = Auth::user();
        // Retrieve the authenticated user
        $user = Auth::user();
        $contacts = $user->contacts()->paginate(10);
        $count = $user->contacts()->count();
        return view('list-contacts', compact('contacts'), compact('count'));
    }

    public function salesallcontacts()
    {
        // $user = Auth::user();
        // Retrieve the authenticated user
        $user = Auth::user();
        $contacts = $user->contacts()->paginate(10);
        $count = $user->contacts()->count();
        return view('saleslist-contacts', compact('contacts'), compact('count'));
    }

    public function EditContact(Contact $contact)
    {

        // $user = Auth::user();
        // Retrieve the authenticated user
        $user = Auth::user();

        // Check if the contact belongs to the authenticated user
        if ($contact->user_id !== $user->id) {
            return redirect()->back()->with('error', 'You do not have permission to edit this contact.');
        }
        //     // Retrieve the contact details based on the provided ID
        //   $contact = Contact::find($contact);

        $contacts = $user->contacts;
        $count = $user->contacts()->count();
        return view('edit-contact', compact('contact', 'contacts'), compact('count'));
    }


    public function SalesEditContact(Contact $contact)
    {

        // $user = Auth::user();
        // Retrieve the authenticated user
        $user = Auth::user();

        // Check if the contact belongs to the authenticated user
        if ($contact->user_id !== $user->id) {
            return redirect()->back()->with('error', 'You do not have permission to edit this contact.');
        }
        //     // Retrieve the contact details based on the provided ID
        //   $contact = Contact::find($contact);

        $contacts = $user->contacts;
        $count = $user->contacts()->count();
        return view('salesedit-contact', compact('contact', 'contacts'), compact('count'));
    }

    public function ShowContact($id)
    {

        // $user = Auth::user();
        // Retrieve the authenticated user
        $user = Auth::user();

        $count = $user->contacts()->count();
        $contacts = $user->contacts;
        $contact = Contact::findOrFail($id);
        return view('view-contact', compact('contact', 'contacts'), compact('count'));
    }

    public function showSalesContact($id)
    {

        // $user = Auth::user();
        // Retrieve the authenticated user
        $user = Auth::user();

        $count = $user->contacts()->count();
        $contacts = $user->contacts;
        $contact = Contact::findOrFail($id);
        return view('salesview-contact', compact('contact', 'contacts'), compact('count'));
    }


    public function convertSalesContact($id)
    {

        // $user = Auth::user();
        // Retrieve the authenticated user
        $user = Auth::user();

        $count = $user->contacts()->count();
        $contacts = $user->contacts;
        $contact = Contact::findOrFail($id);
        $courses = Course::pluck('course_name', 'id');
        return view('salesconvert-contact', compact('contact', 'contacts'), compact('count', 'courses'));
    }





    public function contact()
    {
        // $user = Auth::user();
        // Retrieve the authenticated user
        $user = Auth::user();
        $contacts = $user->contacts;
        $count = $user->contacts()->count();
        return view('contacts', compact('contacts'), compact('count'));
    }

    // public function contacts()
    // {
    //     $contacts = Contact::all();
    //     return view('contacts_methods.search',compact('contacts'));
    // }

    public function deleteContactUser(Request $request, $contactId)
    {
        // Find the contact by ID
        $contact = Contact::find($contactId);

        // Check if the contact exists and is owned by the authenticated user
        if (!$contact || $contact->user_id !== auth()->user()->id) {
            return response()->json(['message' => 'Contact not found or unauthorized.'], 403);
        }

        // Delete the contact
        $contact->delete();

        return redirect()->back()->with('success', 'Contact deleted successfully.');
    }

    public function courseUpdate(Request $request, $id)
    {
        $course = Course::findOrFail($id);

        // Validate the input
        $request->validate([
            'course_logo' => 'nullable|image',
            'banner_page' => 'nullable|image',
            'about_course' => 'nullable|string',
            'course_name' => 'nullable|string',
            'course_obj' => 'nullable|string',
            'tuition_fee' => 'nullable|string',
            'course_cat' => 'nullable|string',
            'course_tag' => 'nullable|string',
            'instructor_name' => 'nullable|string',
            'start_date' => 'nullable|date',
            'course_syllabus' => 'nullable|string',
            'instructor_bio' => 'nullable|string',
            'other_information' => 'nullable|string',
            // Add more validation rules as needed
        ]);

        // Update the course with the new data
        $course->course_name = $request->input('course_name');
        $course->tuition_fee = $request->input('tuition_fee');
        $course->course_cat = $request->input('course_cat');
        $course->course_tag = $request->input('course_tag');
        $course->course_obj = $request->input('course_obj');
        $course->about_course = $request->input('about_course');
        $course->instructor_name = $request->input('instructor_name');
        $course->start_date = $request->input('start_date');
        $course->course_syllabus = $request->input('course_syllabus');
        $course->instructor_bio = $request->input('instructor_bio');
        $course->other_information = $request->input('other_information');
        // Update other fields as needed

        // Update the course logo if a new image is provided
        if ($request->hasFile('course_logo')) {
            $image = $request->file('course_logo');

            // Store the image and get the path
            $path = $image->store('public/course_logo');

            // Create or update the associated profile picture
            if ($course->profilePicture) {
                $course->profilePicture->path = $path;
                $course->profilePicture->save();
            } else {
                $profilePicture = new ProfilePicture([
                    'path' => $path,
                    'imageable_id' => $course->id,
                    'imageable_type' => Course::class,
                ]);
                $course->profilePicture()->save($profilePicture);
            }
        }


        // Update the course logo if a new image is provided
        if ($request->hasFile('banner_page')) {
            $image = $request->file('banner_page');

            // Store the image and get the path
            $path = $image->store('public/course_logo');

            // Create or update the associated profile picture
            if ($course->bannerPicture) {
                $course->bannerPicture->path = $path;
                $course->bannerPicture->save();
            } else {
                $bannerPicture = new BannerPicture([
                    'path' => $path,
                    'imageable_id' => $course->id,
                    'imageable_type' => Course::class,
                ]);
                $course->bannerPicture()->save($bannerPicture);
            }
        }
        // Save the updated course
        $course->save();

        // Redirect back to the course details page
        return redirect()->route('course.view', $id)->with('success', 'Course updated successfully');
    }


    public function subtopicsCreate()
    {
        // Retrieve all courses
        $courses = Course::all();
        return view('admin.course-subtopics-create', compact('courses'));
    }

    public function fetchByCourse($courseId)
    {
        // Retrieve syllabus titles for the selected course
        $syllabusTitles = SyllabusTitle::where('course_id', $courseId)->pluck('title', 'id');

        return response()->json($syllabusTitles);
    }

    public function fetchByTitle($syllabusId)
    {
        // Retrieve syllabus titles for the selected course
        $syllabusTitles = CourseSubtopic::where('syllabus_title_id', $syllabusId)->pluck('title', 'id');

        return response()->json($syllabusTitles);
    }

    public function VideoCreate()
    {
        $courses = Course::all();

        return view('admin.videos-create', compact('courses'));
    }


    // public function VideoStore(Request $request)
    // {


    //     // Validate the uploaded file
    //     $request->validate([
    //         'video' => 'required|mimetypes:video/*|max:102400', // Adjust validation rules as needed
    //     ]);


    //     // Handle the uploaded video
    //     if ($request->hasFile('video')) {
    //         $videoFile = $request->file('video');
    //         $videoName = time() . '_' . $videoFile->getClientOriginalName();

    //         // Store the video in a storage directory (e.g., public/videos)
    //         $videoPath = $videoFile->storeAs('public/videos', $videoName);

    //         // Save the video record in the database
    //         $video = new Video();
    //         $video->name = $videoName;
    //         $video->path = $videoPath;
    //         $video->save();

    //         return response()->json(['message' => 'Video uploaded successfully']);
    //     }

    //     return response()->json(['message' => 'Failed to upload video'], 400);

    // }

    public function VideoStore(Request $request){
        // Validate the incoming request data
        $validatedData = $request->validate([
            'course_id' => 'required|exists:courses,id',
            'syllabus_title_id' => 'required|exists:syllabus_titles,id',
            'subtopic_id' => 'required|exists:course_subtopics,id',
            'title' => 'required|string|max:255',
            'video' => 'required|mimetypes:video/*|max:102400', // 100MB limit
        ]);

        // Create a new 'Video' instance with the validated data
        $video = new Video([
            'course_id' => $validatedData['course_id'],
            'syllabus_title_id' => $validatedData['syllabus_title_id'],
            'subtopic_id' => $validatedData['subtopic_id'],
            'title' => $validatedData['title'],
            'file_path' => 'public/videos', // Set the file path here
        ]);

        // Save the 'Video' instance to the database
        $video->save();

        // Handle file upload logic here
        if ($request->hasFile('video')) {
            $videoFile = $request->file('video');
            $videoName = time() . '_' . $videoFile->getClientOriginalName();

            // Store the video in a storage directory (e.g., public/videos)
            $videoPath = $videoFile->storeAs('public/videos', $videoName);

            // Update the 'file_path' in the 'Video' instance with the actual file path
            $video->file_path = $videoPath;

            // Save the 'Video' instance again to update the 'file_path' in the database
            $video->save();
        }

        // Return a JSON response indicating a successful upload
        return redirect()->route('video.create')->with('success', 'Course subtopic created successfully.');
    }


    public function subtopicsStore(Request $request)
    {
        $request->validate([
            'course_id' => 'required|exists:courses,id', // Ensure the course exists
            'syllabus_title_id' => 'required|exists:syllabus_titles,id', // Ensure the syllabus title exists
            'title' => 'required|string|max:255',
        ]);

        CourseSubtopic::create([
            'course_id' => $request->input('course_id'),
            'syllabus_title_id' => $request->input('syllabus_title_id'),
            'title' => $request->input('title'),
        ]);

        return redirect()->route('subtopics.create')->with('success', 'Course subtopic created successfully.');
    }

    public function syllabusCreate()
    {
        $courses = Course::all();
        return view('admin.syllabus-titles-create', compact('courses'));
    }

    public function syllabusStore(Request $request)
    {
        $request->validate([
            'course_id' => 'required|exists:courses,id', // Ensure the selected course exists
            'title' => 'required|string|max:255',
        ]);

        SyllabusTitle::create([
            'course_id' => $request->input('course_id'),
            'title' => $request->input('title'),
        ]);

        return redirect()->route('syllabus.create')->with('success', 'Syllabus title created successfully.');
    }
    public function search(Request $request)
    {
        // Get the authenticated user
        $user = auth()->user();

        $searchKeyword = $request->input('search');

        // Perform the search query for contacts attached to the authenticated user
        $contacts = $user->contacts()
            ->where('name', 'like', "%$searchKeyword%")
            ->get();

        // Prepare the search results as an array
        $searchResults = [];
        foreach ($contacts as $contact) {
            $searchResults[] = [
                'name' => $contact->name,
                'link' => route('contacts.show', ['contact' => $contact->id]),
                'editLink' => route('edit_contact', ['contact' => $contact->id]),
            ];
        }

        return response()->json($searchResults);
    }


    public function salescontactsearch(Request $request)
    {
        $searchKeyword = $request->input('search');

        // Perform the search query based on your requirements
        $contacts = Contact::where('name', 'like', "%$searchKeyword%")->get();

        // You can also include additional logic or filters based on your needs

        // Prepare the search results as an array
        $searchResults = [];
        foreach ($contacts as $contact) {
            $searchResults[] = [
                'name' => $contact->name,
                'link' => route('contacts.show', ['contact' => $contact->id]),
                'editLink' => route('salesedit_contact', ['contact' => $contact->id]),
            ];
        }

        return response()->json($searchResults);
    }


    public function multistore(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required',
            'nick_name' => 'required',
            'phone_number' => 'required',
        ]);

        $names = $request->input('name');
        $nicknames = $request->input('nick_name');
        $phoneNumbers = $request->input('phone_number');

        $user = Auth::user();

        // Iterate over the arrays and save the contacts to the database
        for ($i = 0; $i < count($names); $i++) {
            // Create a new instance of the Contact model
            $contact = new Contact();

            $contact->name = $names[$i];
            $contact->nickname = $nicknames[$i];
            $contact->phone = $phoneNumbers[$i];
            $contact->user_id = $user->id;
            $contact->password = bcrypt(Str::random(8)); // Encrypt the password
            // Optionally, you can set a serial number based on the user's ID
            $contact->serial_number = 'SN' . $user->id . '-' . $contact->id;
            $user->contacts()->save($contact);
        }

        // Redirect or perform other actions after saving the contacts
        return redirect()->back()->with('success', 'Contacts added successfully!');
    }


    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required',
            'nick_name' => 'required',
            'phone_number' => 'required',
        ]);



        // Create a new contact instance
        $contact = new Contact();

        // Retrieve the authenticated user
        $user = Auth::user();
        // Set the contact attributes
        $contact->name = $request->input('name');
        $contact->phone = $request->input('phone_number');
        $contact->nickname = $request->input('nick_name');
        $contact->user_id = $user->id;
        $contact->password = bcrypt(Str::random(8)); // Encrypt the password
        // Optionally, you can set a serial number based on the user's ID
        $contact->serial_number = 'SN' . $user->id . '-' . $contact->id;

        // Associate the contact with the authenticated user

        $user->contacts()->save($contact);

        // Add profile picture if provided
        // if ($request->hasFile('profile_picture')) {
        //     $path = $request->file('profile_picture')->store('public/profile_pictures');

        //     // Create a new profile picture record
        //     $profilePicture = new ProfilePicture();
        //     $profilePicture->path = $path;

        //     // Save the profile picture relationship
        //     $contact->profilePicture()->save($profilePicture);
        // }

        return redirect()->back()->withInput()->with('success', 'Contact created successfully.');
    }

    public function ContactDestroy(Contact $contact)
    {
        // Retrieve the authenticated user
        // $user = Auth::user();
        // Retrieve the authenticated user
        $user = Auth::user();

        // Check if the contact belongs to the authenticated user
        if ($contact->user_id !== $user->id) {
            return redirect()->back()->with('error', 'You do not have permission to delete this contact.');
        }

        // Delete the profile picture if it exists
        if ($contact->profilePicture) {
            Storage::delete($contact->profilePicture->path);
            $contact->profilePicture->delete();
        }

        // Delete the contact
        $contact->delete();

        return redirect()->route('contact')->with('success', 'Contact deleted successfully.');
    }



    public function logout()
    {
        Auth::logout(); // Log out the authenticated user

        // Perform any additional actions if needed

        return redirect('/login'); // Redirect the user to the login page after logout
    }


    public function Deactivate($id)
    {
        $user = User::findOrFail($id);
        $user->deactivated_at = now();
        $user->save();

        return redirect()->back()->with('success', 'User has been deactivated.');
    }

    public function Activate($id)
    {
        $user = User::findOrFail($id);
        $user->deactivated_at = NULL;
        $user->save();

        // Send reactivation email
        Mail::to($user->email)->send(new ReactivationEmail($user));

        return redirect()->back()->with('success', 'User has been re-activated.');
    }

    public function deactivateAccount(Request $request)
    {
        // Retrieve the authenticated user
        // $user = Auth::user();
        // Retrieve the authenticated user
        $user = Auth::user();

        // Check if the confirmation checkbox is checked
        if (!$request->has('deactivate')) {
            return redirect()->back()->with('error', 'Please confirm the account deactivation.');
        }

        // Mark the user as deactivated
        $user->deactivated_at = now();
        $user->save();

        // Optionally, log the user out
        Auth::logout();

        // Redirect to the desired page or show a success message
        return redirect()->route('login')->with('success', 'Your account has been deactivated.');
    }

    public function inviteList()
    {
        if (auth()->user()->usertype === 'admin' || auth()->user()->usertype === 'subadmin') {
            $salesReps = User::where('usertype', 'salesrep')->get(); // Change the page size (10) as per your requirement

            // Get all contacts with the related user details and paginate the results
            $contacts = Contact::with('user', 'salesRep')->paginate(4); // Change the page size (10) as per your requirement

            return view('admin.invitations', compact('contacts', 'salesReps'));
        }
    }

    public function contactList()
    {
        if (auth()->user()->usertype === 'salesrep') {
            $salesReps = User::where('usertype', 'salesrep')->paginate(10); // Change the page size (10) as per your requirement

            $userId = auth()->user()->id;
            $contacts = Contact::where('sales_id', $userId)->paginate(10);

            return view('salesrep.invitation', compact('contacts', 'salesReps'));
        }
    }

    public function assignContacts(Request $request)
    {
        $contactIds = $request->input('contact_ids');
        $salesRepId = $request->input('sales_rep_id');

        if (empty($contactIds) || !$salesRepId) {
            return redirect()->back()->with('error', 'No contacts selected or sales rep not specified.');
        }

        Contact::whereIn('id', $contactIds)->update(['sales_id' => $salesRepId]);

        return redirect()->back()->with('success', 'Contacts assigned successfully.');
        // $contactIds = $request->input('contact_ids');
        // dd($contactIds);
    }

    public function assignUsers(Request $request)
    {
        $contactIds = $request->input('contact_ids');
        $salesRepId = $request->input('sales_rep_id');

        if (empty($contactIds) || !$salesRepId) {
            return redirect()->back()->with('error', 'No User selected or sales rep not specified.');
        }

        PendingUser::whereIn('id', $contactIds)->update(['sales_id' => $salesRepId]);

        return redirect()->back()->with('success', 'Users assigned successfully.');
        // $contactIds = $request->input('contact_ids');
        // dd($contactIds);
    }

    public function deleteContacts(Request $request, $id)
    {
        // Find the contact by ID
        $contact = Contact::find($id);

        // Check if the contact exists
        if (!$contact) {
            return redirect()->back()->with('error', 'Contact not found.');
        }

        // Delete the contact
        $contact->delete();

        return redirect()->back()->with('success', 'Contact deleted successfully.');
    }


    public function showAdminContact($id)
    {
        if (auth()->user()->usertype === 'admin' || auth()->user()->usertype === 'subadmin') {
            $contact = Contact::with('user', 'salesRep')->find($id);

            if (!$contact) {
                abort(404); // or handle the error in a different way
            }

            return view('admin.contact', compact('contact'));
        }
    }

    // course controllers
    public function createCourse()
    {
        if (auth()->user()->usertype === 'admin' || auth()->user()->usertype === 'subadmin') {
            return view('admin.course-create');
        }
    }

    public function storeCourse(Request $request)
    {
        if (auth()->user()->usertype === 'admin' || auth()->user()->usertype === 'subadmin') {
            // Validate the request data
            $validatedData = $request->validate([
                'course_logo' => 'nullable|image',
                'about_course' => 'nullable|string',
                'course_name' => 'nullable|string',
                'course_cat' => 'nullable|string',
                'course_tag' => 'nullable|string',
                'course_obj' => 'nullable|string',
                'tuition_fee' => 'nullable|string',
                'instructor_name' => 'nullable|string',
                'start_date' => 'nullable|date',
                'course_syllabus' => 'nullable|string',
                'instructor_bio' => 'nullable|string',
                'other_information' => 'nullable|string',
            ]);

            // Create a new course
            $course = Course::create($validatedData);

            // Add profile picture if provided
            if ($request->hasFile('course_logo')) {
                $path = $request->file('course_logo')->store('public/course_logo');

                // Create a new profile picture record
                $profilePicture = new ProfilePicture();
                $profilePicture->path = $path;

                // Save the profile picture relationship
                $course->profilePicture()->save($profilePicture);
            }

            return redirect()->back()->with('success', 'Course added successfully.');
        }
    }



    public function listCourse()
    {
        $courses = Course::paginate(10); // Change the page size (10) as per your requirement

        foreach ($courses as $course) {
            $userCourseCount = User::where('service', $course->id)->count();
            $course->userCourseCount = $userCourseCount;

            $userCourseCountPaid = User::where('service', $course->id)
                ->where('payment_status', 'paid')
                ->count();
        }

        return view('admin.course-list', compact('courses'));
    }
}
