<?php

namespace App\Support;

use Illuminate\Support\Facades\Auth;

final class DemoMode
{
    public static function activeForCurrentUser(): bool
    {
        if (! config('rino-demo.enabled')) {
            return false;
        }

        $email = config('rino-demo.email');
        $user = Auth::user();

        return $user !== null
            && is_string($email)
            && $email !== ''
            && strcasecmp((string) $user->email, $email) === 0;
    }
}
