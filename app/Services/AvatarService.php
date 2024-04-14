<?php

namespace App\Services;


use App\Http\Controllers\ProfileController;
use App\Models\UserParam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;

class AvatarService
{
    public static function getAllAvatars()
    {
        foreach (glob(public_path('userAvatars/*.png')) as $filename) {
            $namesOfPNGs[ 'userAvatars/'. basename($filename)] = pathinfo($filename, PATHINFO_FILENAME);
        }
        unset($namesOfPNGs['userAvatars/hacker.png']);
        return $namesOfPNGs;
    }

    public static function getAvatar($avatar)
    {
        return public_path($avatar);
    }

    public static function getAvatarName($avatar)
    {
        return pathinfo($avatar, PATHINFO_FILENAME);
    }

    public static function getAvatarPath($avatar)
    {
        return pathinfo($avatar, PATHINFO_DIRNAME);
    }

    public static function save(Request $request)
    {
        $saveButton = (new ProfileController)->openSaveButtonForAvatar();
        if ($saveButton['saveButton'] == 'true') {
            $avatarName = $request->input('avatar') . '.png';
            (new UserParam)->setParam('avatar', $avatarName, $request->user()->id);
        } else {
            Log::error('Error in save method: saveButton is false');
        }

        return Redirect::to('/profile')->with('status', 'avatar-updated');
    }

}
