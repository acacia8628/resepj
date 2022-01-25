<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

class VerifyEmailController extends Controller
{
    /**
     * Mark the authenticated user's email address as verified.
     *
     * @param  \Illuminate\Foundation\Auth\EmailVerificationRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke(EmailVerificationRequest $request)
    {
        $user = $request->user();

        if ($user->hasVerifiedEmail() && $user->role == 3) {
            return redirect()->intended('/manager/login');
        } elseif ($user->hasVerifiedEmail()) {
            return redirect()->intended('/login');
        }

        if ($user->markEmailAsVerified() && $user->role == 3) {
            event(new Verified($user));
            return redirect()->intended('/manager');
        } elseif ($user->markEmailAsVerified()) {
            event(new Verified($user));
        }

        if ($user->role == 3) {
            return redirect()->intended('/manager/login');
        } else {
            return redirect()->intended('/thanks');
        }
    }
}
