<?php

namespace App\Http\Controllers\Auth;

use App\Models\Language;
use App\Models\AcquaintedUs;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{

    public function showLoginForm()
    {
        checkLocale(request());
        $url = env('APP_URL');

        return view('auth.login', compact('url'));
    }

    public function showForgotPasswordForm()
    {
        checkLocale(request());
        return view('auth.passwords.forgot');
    }

    public function showRegisterForm()
    {
        checkLocale(request());
        $acquaintedUs = AcquaintedUs::get();
        $languages = Language::active()->get();
        return view('auth.register', compact('acquaintedUs', 'languages'));
    }
}
