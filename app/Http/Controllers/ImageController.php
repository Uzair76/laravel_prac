<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    // Other methods...

    public function create(User $user)
    {
        return view('user.upload_image', compact('user'));
    }

    public function store(Request $request, User $user)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $filePath = $request->file('image')->store('images', 'public');
            $user->images()->create(['file_path' => $filePath]);
        }

        return redirect()->route('users.index')->with('success', 'Image uploaded successfully.');
    }
}
