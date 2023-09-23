<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\User;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    //
    public function index()
    {

        if(Auth::id()){
            $usertype = Auth::user()->usertype;

            if($usertype == 'user'){
                 // Retrieve the authenticated user
            $user = Auth::user();


            $contactCount = $user->contacts()->count();

            $userCount = User::count();


            // $contactCountDate = Contact::where('created_at', '>', $user->created_at)->count();
            $userCountDate = User::where('created_at', '>', $user->created_at)->count();

            $totalCount = $userCountDate;

            // Assuming you have a variable $value that represents the user's value


            $sequence = [4, 16, 64, 256];
            $level = 0;

            foreach ($sequence as $number) {
                if ($totalCount >= $number) {
                    $level++;
                } else {
                    break; // No need to continue checking the rest of the sequence
                }
            }
            if ($level == 0 && $totalCount < 4) {
                $pay = 0;
                $commissionPercentage = 0;
            } elseif ($level == 1 && $totalCount == 4) {
                $pay = 100000 * $totalCount;
                $commissionPercentage = 10;
            } elseif ($level == 1 || $totalCount >= 5 && $totalCount <= 15) {
                $pay = 100000 * 4;
                $commissionPercentage = 10;
            } elseif ($level == 2 && $totalCount == 16) {
                $pay = 100000 * $totalCount;
                $commissionPercentage = 8;
            } elseif ($level == 2 || $totalCount >= 17 && $totalCount <= 63) {
                $pay = 100000 * 16;
                $commissionPercentage = 8;
            } elseif ($level == 3 && $totalCount == 64) {
                $pay = 100000 * $totalCount;
                $commissionPercentage = 6;
            } elseif ($level >= 3 || $totalCount >= 65 && $totalCount <= 255) {
                $pay = 100000 * $totalCount;
                $commissionPercentage = 6;
            } elseif ($level == 4 && $totalCount == 256) {
                $pay = 100000 * $totalCount;
                $commissionPercentage = 4;
            }

            $WalletAmountGross = $pay * ($commissionPercentage / 100);

            // Get the total withdraw request count
            $totalWithdrawRequests = WalletStatement::where('user_id', $user->id)
                ->where('type', 'withdrawal')->count();

            $paymentStatus = WalletStatement::where('user_id', $user->id)
                ->where('type', 'withdrawal')
                ->where('payment_status', 'approved')
                ->sum('amount');

            // Check if the payment status is verified
            if ($paymentStatus > 0) {
                $WalletAmount = $WalletAmountGross - $paymentStatus;
            } else {
                $WalletAmount = $WalletAmountGross;
            }


            $user->level = $level;
            $user->wallet_amount = $WalletAmount;
            $user->commission_status = 'pending';
            $user->commission_percentage = $commissionPercentage;
            $user->save();


            //Retrieve User Service from Database
            $service = $user->service;
            return view('dashboard', compact('contactCount', 'userCount', 'totalCount', 'WalletAmount', 'commissionPercentage', 'level', 'service','serial_number'));
            }elseif($usertype == 'admin'){
                return view('admindash');
            }else{
                return redirect()->back();
            }
          }
        }

        public function userlist(){
            // Check if the authenticated user is an admin
    if (auth()->user()->usertype === 'admin') {
        $contacts = User::all(); // Fetch all contacts from the database
        // User is an admin, allow access to the userlist view
        return view('admin.users-list',compact('contacts'));
    }

    // User is not an admin, redirect or show an error message
    return redirect()->back()->with('error', 'You do not have permission to access this page.');
        }

}
