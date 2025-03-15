<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Hall;
use App\Models\Category;


class HallController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $halls = Hall::all();
        return view('management.hall')->with('halls', $halls);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $categories = Category::all();
        return view('management.createHall')->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:halls|max:255',
            'price' => 'required|numeric',
            'category_id' => 'required|numeric'
        ]);

        //if a user does not uploade an image, use noimge.png for the hall
        $imageName = "noimage.png";

        //if a user upload image
        if ($request->hasFile('image')) {
            $request->validate([
                'image' => 'nullable|file|image|mimes:jpeg,png,jpg|max:5000'
            ]);
            $imageName = date('mdYHis') . uniqid() . '.' . $request->image->extension();
            $request->image->move(public_path('hall_images'), $imageName);
        }

        $hall = new Hall();
        $hall->name = $request->name;
        $hall->price = $request->price;
        $hall->image = $imageName;
        $hall->description = $request->description;
        $hall->category_id = $request->category_id;
        $hall->save();

        session()->flash('status', $request->name . " is updated successfully");
        return redirect('/management/hall');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $hall = Hall::find($id);
        $categories = Category::all();
        return view('management.editHall')->with('hall', $hall)->with('categories', $categories);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         // information validation
         $request->validate([
            'name' => 'required|max:255',
            'price' => 'required|numeric',
            'category_id' => 'required|numeric'
        ]);
        $hall = Hall::find($id);
        // validate if a user upload image
        if($request->image){
            $request->validate([
                'image' => 'nullable|file|image|mimes:jpeg,png,jpg|max:5000'
            ]);
            if($hall->image != "noimage.png"){
                $imageName = $hall->image;
                unlink(public_path('hall_images').'/'.$imageName);
            }
            $imageName = date('mdYHis').uniqid().'.'.$request->image->extension();
            $request->image->move(public_path('hall_images'), $imageName);
        }else{
            $imageName = $hall->image;
        }

        $hall->name = $request->name;
        $hall->price = $request->price;
        $hall->image = $imageName;
        $hall->description = $request->description;
        $hall->category_id = $request->category_id;
        $hall->save();
        session()->flash('status', $request->name . " is updated successfully");
        return redirect('/management/hall');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $hall = Hall::find($id);
        if($hall->image != "noimage.png"){
            unlink(public_path('hall_images').'/'.$hall->image);
        }
        $hallName = $hall->name;
        $hall->delete();
        Session()->flash('status', $hallName. ' is deleted successfully');
        return redirect('/management/hall');
        
    }
}
