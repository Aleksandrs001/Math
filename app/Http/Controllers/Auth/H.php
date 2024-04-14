<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Authenticatable;

class H extends Controller
{
    public static function user(): ?Authenticatable
    {
        if (auth()->check()) {
            return auth()->user();
        }
        return null;
    }

    public static function isAdmin(): bool
    {
        $userParams = H::user()->userParam()->get();
        if ($userParams->isEmpty()) {
            return false;
        } elseif ($userParams->where('param', 'superAdmin')->isEmpty()) {
            return false;
        } else {
            return $userParams->where('param', 'superAdmin')->first()->value == 'true';
        }
    }

}
