<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class RecaptchaHelper
{
    /**
     * Verify Google reCAPTCHA v2.
     *
     * @param \Illuminate\Http\Request $request
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public static function verify(Request $request): void
    {
        $secret = config('services.recaptcha.secret');
        $token  = $request->input('g-recaptcha-response');

        $resp = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret'   => $secret,
            'response' => $token,
            'remoteip' => $request->ip(),
        ])->json();

        if (!($resp['success'] ?? false)) {
            throw ValidationException::withMessages([
                'captcha' => 'Captcha verification failed. Please try again.',
            ]);
        }
    }
}
