<?php

namespace App\Http\Controllers;

class UserController
{
    static function getUserName()
    {
        $user = auth()->user();
        if ($user) {
            return $user->name;
        } else {
            return '';
        }
    }
}
