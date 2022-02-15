<?php

namespace App\Http\Controllers\Auth;

use Exception;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\PasswordReset;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use App\Notifications\Site\Auth\UserResetPasswordRequestNotification;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    /**
     * Display the form to request a password reset link.
     *
     * @return \Illuminate\View\View
     */
    public function showLinkRequestForm()
    {
        checkLocale(request());
        return view('auth.passwords.email');
    }

    public function forgotPasswordEmail(Request $request)
    {
        // dd("ss");
        $request->validate([
            'email' => 'required|email',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->with('error', __('passwords.user'));
        }

        $passwordReset = PasswordReset::updateOrCreate(
            ['email' => $user->email, 'type' => 'user'],
            [
                'email' => $user->email,
                'token' => Str::random(60)
            ]
        );

        if ($user && $passwordReset) {
            try {
                $user->notify(
                    new UserResetPasswordRequestNotification($passwordReset->token, 'email')
                );
            } catch (Exception $e) {
            }

            return back()->with('success', __('passwords.sent'));
        }
    }

    public function forgotPasswordPhone(Request $request)
    {
        $request->validate([
            'phone' => 'required|string',
        ]);

        $user = User::where('phone', $request->phone)->first();

        if (!$user) {
            return $this->responseError('user not found with phone!', 404);
        }

        $passwordReset = PasswordReset::updateOrCreate(
            ['phone' => $user->phone, 'type' => 'user'],
            [
                'phone' => $user->phone,
                'token' => Str::random(6)
            ]
        );

        if ($user && $passwordReset) {
            //            $user->notify(
            //                new UserResetPasswordRequest($passwordReset->token)
            //            );

            return $this->responseSuccess([
                'msg' => "We send sms your password reset token!",
                'expired_at' => 120
            ]);
        }
    }
}
