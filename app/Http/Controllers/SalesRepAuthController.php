<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class SalesRepAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('salesrep.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('salesrep')->attempt($credentials)) {
            // Authentication successful
            return redirect()->intended('/salesrep/dashboard');
        }

        // Authentication failed
        return redirect()->back()->withInput()->withErrors([
            'email' => 'Invalid credentials',
        ]);
    }
}

