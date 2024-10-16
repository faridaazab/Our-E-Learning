<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserProfileController extends Controller
{
    public function profileView() // GET
    {
        $user = User::findOrFail(auth()->user()->id);
        return view('website.profile-management.profile-view', compact('user'));
    }

    public function updateProfile(Request $request, string $id) // PATCH
    {
        $id = auth()->user()->id;
        $user = User::findOrFail($id);

        $request->validate([
            'name'   => 'required|string|max:255',
            'phone'  => 'required|digits:11',
            'gender' => 'required|in:male,female',
        ]);

        $user->update($request->all());

        return redirect()->back()->with('success', 'Your profile has been updated successfully.');
    }
}
