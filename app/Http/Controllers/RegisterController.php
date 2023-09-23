<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Course;
use App\Models\PendingUser;
use App\Models\User;
use App\Notifications\NewUserRegistered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Mail\SerialNumberNotification;
use Illuminate\Auth\Events\Registered;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Mail;
use Laravel\Fortify\Contracts\VerifyEmailViewResponse;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Notification;
use App\Notifications\CustomVerifyEmailNotification;
use App\Events\NewUserRegisteredEvent;



class RegisterController extends Controller
{
    public function showRegistrationForm()
    {

        $courses = Course::all();
        return view('auth.register', compact('courses'));
    }

    public function showRegistrationFormenroll()
    {
        // Fetch the selected course based on the provided course ID
        $selectedCourseId = request()->query('course_id');
        $selectedCourse = Course::find($selectedCourseId);

        // You should also pass any other required data to the view
        return view('auth.enroll', compact('selectedCourse'));
    }

    public function register(Request $request)
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


        $courseService = $request->service;

        // Retrieve the course tuition_fee based on the provided service
        $course = Course::where('id', $courseService)->first();

        if ($course) {
            $tuitionFee = $course->tuition_fee;
            // Use the $tuitionFee as needed
        }


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
        $user->save();


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

    public function registerInst(Request $request)
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
        $enrollment_status = 1;


        $courseService = $request->service;

        // Retrieve the course tuition_fee based on the provided service
        $course = Course::where('id', $courseService)->first();

        if ($course) {
            $tuitionFee = $course->tuition_fee;
            // Use the $tuitionFee as needed
        }
        $amount = $tuitionFee / 3;

        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'phone_number' => $request->phone_number,
            'service' => $request->service,
            'serial_number' => $newSerialNumber,
            'payment_status' => $paid,
            'enrollment_status' => $enrollment_status,
            'sub_amount' => $amount,
            'check_id' => $check_id,
        ]);
        $user->save();


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

    public function payregister(Request $request)
    {
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


        // Delete the pending user record
        PendingUser::where('email', $validatedData['email'])->delete();

        // Mail::to($user->email)->send(new SerialNumberNotification($user->serial_number,$user->name));




        if ($user instanceof MustVerifyEmail && !$user->hasVerifiedEmail()) {

            //     $user->sendEmailVerificationNotification();

            //     return redirect()->route('verification.notice');

            // Send email notification with the serial number and verification URL
            $user->sendEmailVerificationNotification();
        }




        // Redirect the user to the desired location
        return redirect()->route('dashboard');
    }




    public function contactregister($contact_id,$sales_id)
{
    // Retrieve the user based on the user_id
    $user = Contact::find($contact_id);
    $courses = Course::all();

    // Check if the user exists
    if (!$user) {
        // Handle the case when the user is not found
        return redirect()->back()->withErrors('User not found.');
    }

    // Generate the form fields
    $formFields = [
        'name' => $user->name,
        'email' => $user->email,
        'phone_number' => $user->phone,
        'service' => $user->service,
        'upline' => $user->upline,
        // Add more fields as needed
    ];


    // Pass the form fields and form action to the payment view
    return view('auth.paymentcontacts', compact('formFields','courses','sales_id'));
}


public function contactssaveUserData(Request $request)
{
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
        'sales_id' => $request->sales_id,
        'upline' => $request->upline,
    ]);

    $user->save();


    // Delete the pending user record
     Contact::where('email', $validatedData['email'])->delete();

    // Mail::to($user->email)->send(new SerialNumberNotification($user->serial_number,$user->name));




    if ($user instanceof MustVerifyEmail && !$user->hasVerifiedEmail()) {

            // $user->sendEmailVerificationNotification();

            // return redirect()->route('verification.notice');

        // Send email notification with the serial number and verification URL
        $user->sendEmailVerificationNotification();
    }




    // Redirect the user to the desired location
    return redirect()->route('dashboard');
}

}
