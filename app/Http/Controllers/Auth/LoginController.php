<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Features;
use Laravel\Fortify\Fortify;
use App\Providers\RouteServiceProvider;



class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }

    protected function authenticated(Request $request, $user)
    {
        if ($request->has('remember')) {
            Auth::guard()->setRememberToken($user->getRememberToken());
            $rememberTokenName = Auth::guard()->getRecallerName();
            $rememberTokenValue = encrypt($user->getKey().'|'.$user->getRememberToken());
            $cookie = cookie($rememberTokenName, $rememberTokenValue, 60 * 24 * 30); // 30 days
            $request->cookies->add([$rememberTokenName => $rememberTokenValue]);
            $user->setRememberToken($user->getRememberToken());
            $user->save();
        }
    }


    /**
     * Handle an incoming authentication request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('email', 'password');

        // Check if the user account is deactivated
        $user = User::where('email', $credentials['email'])->first();

        if (!$user || !$user->isActive() || !Auth::attempt($request->only('email', 'password'), $request->filled('remember'))) {
            return back()->withErrors([
                'email' => __('auth.failed'),
            ])->withInput();
        }

        if (Features::enabled(Features::twoFactorAuthentication()) && Auth::user()->two_factor_secret) {
            return redirect()->route('two-factor.login');
        }

        return redirect()->intended(RouteServiceProvider::HOME);
    }


    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::logout(); // Log out the authenticated user

        // Perform any additional actions if needed

        return redirect('/login'); // Redirect the user to the login page after logout
    }
}
