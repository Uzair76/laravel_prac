<?php

namespace App\Http\Controllers;

use App\Models\House;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a list of users with their assigned houses.
     */
    public function index()
    {
        // $house=House::find(1);
        // $house->images()->create([

        //     'file_path'=>'dsa'
        // ]);
        // $users = House::find(1);
        // return $users->images;
        $users = User::with('houses')->get(); // Fetch users with their houses
        return view('user.index', compact('users'));
    }
    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8|confirmed',
                'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048', // Validate image
            ]);

            // Handle the image upload
            $imagePath = null;
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('images', 'public'); // Store in 'public/images'
            }

            // Create the user
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
            ]);
            echo $user;

            // If there's an image, store it in the images table and associate it with the user
            if ($imagePath) {
                $user->images()->create([
                    'path' => $imagePath,
                ]);
            }
            return $user->images;


            return redirect()->route('users.index')->with('success', 'User created successfully.');
        } catch (\Exception $e) {
            // Log the error for debugging
            \Log::error('Error creating user: ' . $e->getMessage());

            // Optionally, display a user-friendly error message
            return back()->withErrors(['error' => 'An error occurred while creating the user. Please try again.']);
        }
    }


    // Example method for creating an image for a house
    public function addImageToHouse(Request $request, $houseId)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048', // Validate image
        ]);

        $house = House::findOrFail($houseId);

        // Handle the image upload
        $imagePath = $request->file('image')->store('images', 'public'); // Store in 'public/images'

        // Create the image and associate it with the house
        $house->images()->create([
            'file_path' => $imagePath,
        ]);

        return back()->with('success', 'Image uploaded successfully.');
    }

    /**
     * Show the form for assigning houses to a specific user.
     */
    public function assignHouses($id)
    {
        $user = User::findOrFail($id); // Get the user or throw a 404 error
        $houses = House::all();       // Get all available houses
        return view('user.assign', compact('user', 'houses'));
    }

    /**
     * Store assigned houses for a specific user.
     */
    public function storeAssignedHouses(Request $request, $id)
    {
        $user = User::findOrFail($id); // Find the user or throw a 404 error

        // Validate the request data
        $request->validate([
            'houses' => 'required|array',
            'houses.*' => 'exists:houses,id',
        ]);

        // Attach the houses to the user (sync removes old associations)
        $user->houses()->sync($request->houses);

        // Redirect back to the user index page with a success message
        return redirect()->route('user.index')->with('success', 'Houses assigned successfully.');
    }
}
