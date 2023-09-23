<?php

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ActivationController extends Controller
{
    public function activate(Request $request, $token)
    {
        $user = User::where('activation_token', $token)->first();

        if ($user) {
            $user->deactivated_at = null;
            $user->activation_token = null;
            $user->save();

            // Optionally, you can log in the user programmatically
            // auth()->login($user);

           // Generate the activation URL with the correct domain
        $activationUrl = url('/activate/' . $token);

        return redirect()->away($activationUrl);

        }

        abort(404);
    }
}
