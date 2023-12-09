<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;
use App\Models\LoginHistory;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('admin.profile', [
            'user' => $request->user(),
        ]);
    }
    public function password(Request $request): View
    {
        return view('admin.password', [
            'user' => $request->user(),
        ]);
    }
    public function account(Request $request): View
    {
        return view('admin.delete', [
            'user' => $request->user(),
        ]);
    }
    public function history(Request $request): View
    {
       $user=  $request->user();
        $log =  LoginHistory::where('user_id',$user->id)->orderBy('id', 'desc')->take(10)->get();
        return view('admin.login-history', ['logs'=>$log]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {

        $user = $request->user();
       $user->fill($request->validated());
       if ($request->hasFile('image')) {
        if ($user->image) {
            Storage::delete('profile_image/' . $user->image);
        }
        $imgName = 'profile_' . $request->image->extension();
        $imagePath =  $request->image->move(public_path('profile_image'), $imgName);
        $user->image = basename($imagePath);
    }

    $user->gender = $request->input('gender');
    $user->phone = $request->input('phone');
    if ($user->isDirty('email')) {
        $user->email_verified_at = null;
    }
    $user->save();
    return redirect()->route('profile.edit')->with('success', 'profile-updated');

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
}
