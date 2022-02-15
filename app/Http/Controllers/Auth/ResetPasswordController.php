<?php

namespace App\Http\Controllers\Customer\Auth;

use App\Enum\AuthGuardEnum;
use Illuminate\Http\Request;
use App\Models\PasswordReset;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;

class ResetPasswordController extends Controller
{
    protected $guard = AuthGuardEnum::USER;

    /**
     * Display the password reset view for the given token.
     *
     * If no token is present, display the link request form.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showResetForm(Request $request)
    {
        $urlToken = $request->route()->parameter('token');

        $token = PasswordReset::where('token', $urlToken)->first();
        if (!$token) {
            return;
        }

        return view('auth.passwords.user-reset')->with(
            ['token' => $token->token, 'email' => $token->email]
        );
    }

    public function resetPasswordEmail(Request $request)
    {
        // dd("dd");
        $request->validate(
            [
                'email' => 'required|string|email',
                'password' => 'required|string|confirmed',
                'token' => 'required|string'
            ]
        );

        $passwordReset = PasswordReset::where([
            ['token', $request->token],
            ['email', $request->email],
            ['type', 'user'],
        ])->first();


        if (!$passwordReset) {
            return back()->with('error', 'This password reset token is invalid.');
        }

        $user = User::where('email', $passwordReset->email)->first();
        if (!$user) {
            return back()->with('error', "We can't find a user with that e-mail address.");
        }

        $user->password = $request->password;
        $user->save();
        $passwordReset->delete();
        //        $user->notify(new UserResetPasswordSuccess($passwordReset));
        return redirect()->route('auth.login.form')->with('success', 'password changed');
    }
}
