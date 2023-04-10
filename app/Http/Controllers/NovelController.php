<?php

namespace App\Http\Controllers;

use App\Models\Novel;
use App\Models\Chapter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class NovelController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


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
            'image' => 'required|image',
            'text_file' => 'required|mimes:txt',
        ]);

        // Handle the image upload
        $imagePath = $validatedData['image']->store('public/images');
        $imagePath = str_replace('public/', 'storage/', $imagePath);

        // Create the new novel
        $novel = Novel::create([
            'title' => $validatedData['title'],
            'author' => $validatedData['author'],
            'description' => $validatedData['description'],
            'cover' => $imagePath,
        ]);

        // Handle the text file upload
        $textFilePath = $validatedData['text_file']->getRealPath();
        $fileContent = file_get_contents($textFilePath);
        $lines = file($textFilePath, FILE_IGNORE_NEW_LINES);

        // Divide the lines into chunks of 100 and create a new Chapter for each chunk
        $chapters = collect($lines)->chunk(100)->map(function ($chunk, $index) use ($novel) {
            $title = "Chapter " . ($index + 1);
            $chapter_number = $index + 1;
            $content = implode("\n", $chunk->toArray());

            return new Chapter([
                'novel_id' => $novel->id,
                'title' => $title,
                'chapter_number' => $chapter_number,
                'content' => $content,
            ]);
        });

        try {
            // Save the chapters to the database
            $novel->chapters()->saveMany($chapters);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

        return redirect()->route('novels.create')
            ->withSuccess('You have successfully uploaded a novel');
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
