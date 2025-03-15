<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coaches;


class CoachesController extends Controller
{
    public function index()
    {
        $coaches = Coaches::latest()->get();
        return view('coaches.index', compact('coaches'));
    }

    public function create()
    {

        return view('coaches.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:coaches|max:255',
            'position' => 'nullable|string|max:255',
            'facebook' => 'nullable|url|max:255',
            'image' => 'nullable|file|image|mimes:jpeg,png,jpg|max:5000'

        ]);

        // If a user does not upload an image, use noimage.png for the coaches
        $imageName = "noimage.png";

        // If a user uploads an image
        if ($request->hasFile('image')) {
            $request->validate([
                'image' => 'nullable|file|image|mimes:jpeg,png,jpg|max:5000'
            ]);
            $imageName = date('mdYHis') . uniqid() . '.' . $request->image->extension();
            $request->image->move(public_path('coaches_images'), $imageName);
        }

        $coach = new Coaches();
        $coach->name = $request->name;
        $coach->position = $request->position;
        $coach->facebook = $request->facebook;
        $coach->image = $imageName;

        $coach->save();

        session()->flash('status', $request->name . " is added successfully");
        return redirect()->route('coaches.index');
    }
}
