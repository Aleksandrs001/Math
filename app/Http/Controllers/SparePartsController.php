<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Log;

class SparePartsController
{
    public function carSpareParts()
    {
//        return view('carSpareParts')->with(
//            [
//                'phone' => '+371 27020098',
//                'email'=> '',
//                'adress'=> 'Riga, Latvia',
//                'adress2'=> 'Kengaraga 2b',
//                'index'=> 'LV-1057',
//                'workingHours',
//                'siteName' => 'www.disk.lv'
//
//            ]
//        );
        Log::debug('carSpareParts');
        return view('carSpareParts');
    }

}
