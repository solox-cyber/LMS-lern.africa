<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\PendingUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\QueryException;
use App\Mail\UserRegistrationNotification;
use Illuminate\Support\Facades\Mail;



class PendingUserController extends Controller
{


    public function salesrepsaveUserData(Request $request)
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
        PendingUser::where('email', $validatedData['email'])->delete();

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

    public function saveUserData(Request $request)
    {
        try {
            // Validate the registration form fields
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8|confirmed',
                'service' => 'required',
            ]);

            // Create a new user record
            $user = PendingUser::create([
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'password' => Hash::make($validatedData['password']),
                'phone_number' => $request->phone_number,
                'service' => $request->service,
            ]);

            // Perform any additional actions (e.g., sending email notifications, etc.)

            $user->save();

            $paymentUrl = route('payment', ['user_id' => $user->id]);


            // Send the registration email with the payment link
            Mail::to($user->email)->send(new UserRegistrationNotification($user, $paymentUrl));


            return redirect()->back();
        } catch (ValidationException $e) {
            // Handle validation errors
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (QueryException $e) {
            // Handle duplicate entry error
            if ($e->errorInfo[1] == 1062) {
                $message = 'Email already exists. Please choose a different email address.';
                return redirect()->back()->withErrors([$message])->withInput();
            }

            // Handle other database errors
            $message = 'An error occurred while saving user data.';
            return redirect()->back()->withErrors([$message])->withInput();
        }
    }

    public function payment($user_id)
    {
        // Retrieve the user based on the user_id
        $user = PendingUser::find($user_id);
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
            'phone_number' => $user->phone_number,
            'service' => $user->service,
            // Add more fields as needed
        ];


        // Pass the form fields and form action to the payment view
        return view('auth.payment', compact('formFields', 'courses'));
    }


    public function salesrepregister($contact_id, $sales_id)
    {
        // Retrieve the user based on the user_id
        $user = PendingUser::find($contact_id);
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
            'phone_number' => $user->phone_number,
            'service' => $user->service,
            // Add more fields as needed
        ];


        // Pass the form fields and form action to the payment view
        return view('auth.paymentsales', compact('formFields', 'courses', 'sales_id'));
    }
}
