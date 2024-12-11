<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Auth\H;
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\MathDivideModel;
use App\Services\AvatarService;
use App\Services\DivideService;
use App\Services\MinusService;
use App\Services\MultiplyService;
use App\Services\PlusService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
            'avatars' => AvatarService::getAllAvatars(),
            'statistic' => ProfileController::openSaveButtonForAvatar(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function openSaveButtonForAvatar(): array
    {
        $result['divide'] = DivideService::getWinDivide();
        $result['multiply'] = MultiplyService::getWinMultiply();
        $result['plus'] = PlusService::getWinPlus();
        $result['minus'] = MinusService::getWinMinus();
        $result['plus_find_x'] = PlusService::getWinPlusXFind();
        $result['minus_find_x'] = MinusService::getWinMinusXFind();
        $result['long_divide_without_reminder'] = DivideService::getWinLongDivideWithoutReminder();

        $result['saveButton'] = false;
        if ($result['divide']['completed'] && $result['multiply']['completed'] && $result['plus']['completed'] && $result['minus']['completed'] && $result['plus_find_x']['completed'] && $result['minus_find_x']['completed'] && $result['long_divide_without_reminder']['completed']) {
            $result['saveButton'] = true;
        }

        if (H::isAdmin()) {
            $result['saveButton'] = true;
        }

        return $result;
    }

}
