<?php

namespace App\Http\Controllers;

use App\Models\House;
use Illuminate\Http\Request;

class HouseController extends Controller
{
    //
    public function index(){
        $houses= House::all();
        return view('house.index',compact('houses'));
    }

    public function create()
    {
        return view('house.create');
    }

    public function store(Request $request){

        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'area' => 'required|string|max:255',
        ]);
        $house = new House();
        $house->name = $request->name;
        $house->address = $request->address;
        $house->area = $request->area;

        if($house->save()){
            return redirect()->route('houses.index')->with('success', 'House created successfully!');
        }
    }

    public function update(Request $request, $id)
{
    // Validate the incoming data
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'address' => 'required|string|max:255',
        'area' => 'required|string|max:255',
    ]);

    // Find the house and update its details
    $house = House::findOrFail($id);
    $house->name = $validated['name'];
    $house->address = $validated['address'];
    $house->area = $validated['area'];
    $house->save();

    // Redirect back with a success message
    return redirect()->route('houses.index')->with('success', 'House updated successfully!');
}

    public function edit($id)
    {
        // Find the house by its ID
        $house = House::findOrFail($id);

        // Return the edit view with the house data
        return view('house.edit', compact('house'));
    }




    public function delete(Request $request,$id){
        // return $id;
        $house= House::find($request->id);
        // return $house;
        if($house->delete()){
            return redirect('houses');
        }
    }
}
