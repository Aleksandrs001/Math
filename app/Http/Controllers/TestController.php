<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController
{
    public function test_data(Request $request)
    {
        return $request;
    }

}
