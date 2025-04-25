<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Tentukan ke mana redirect user saat tidak terautentikasi.
     */
    protected function redirectTo($request): ?string
    {
        // Custom redirect ke route tertentu jika belum login
        if (!$request->expectsJson()) {
            return route('login.view'); // Ganti sesuai nama route login kamu
        }

        return null;
    }
}
