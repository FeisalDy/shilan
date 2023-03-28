<?php

namespace App\Http\Controllers;

use App\Models\Novel;
use Illuminate\Http\Request;

class NovelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('novels.create');
    }

    public function store(Request $request)
    {
        // Validate the input
        $validatedData = $request->validate([
            'title' => 'required',
            'author' => 'required',
            'description' => 'required',
            'image' => 'required|image|max:2048',
            'text_file' => 'required|mimes:txt|max:2048',
        ]);

        // Handle the image upload
        $imagePath = $validatedData['image']->store('public/images');
        $imagePath = str_replace('public/', 'storage/', $imagePath);

        // Handle the text file upload
        $textPath = $validatedData['text_file']->store('public/text');
        $textPath = str_replace('public/', 'storage/', $textPath);

        // Create the new novel
        $novel = new Novel;
        $novel->title = $validatedData['title'];
        $novel->author = $validatedData['author'];
        $novel->description = $validatedData['description'];
        $novel->cover = $imagePath;
        $novel->file = $textPath;
        $novel->save();

        return redirect()->route('novels.create')
            ->withSuccess('You have successfully Uploaded a Novel');
    }


    /**
     * Display the specified resource.
     */
    public function show(Novel $novel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Novel $novel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Novel $novel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Novel $novel)
    {
        //
    }
}
