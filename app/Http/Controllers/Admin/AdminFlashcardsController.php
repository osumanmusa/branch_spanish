<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Inertia\Response;
use App\Models\Flashcard;

class AdminFlashcardsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $flashcards=Flashcard::select('*')->paginate(15);
        return Inertia::render('Admin/Flashcards/index',[
            'flashcards'=> $flashcards
        ]);
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Admin/Flashcards/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      
        $request->validate([
            'category' => 'required',
            'title' => 'required',
            'flashcard' => 'required',
            'backcontent' => 'required',
            'frontcontent' => 'required',
        ]);


        $flashcard = Flashcard::create([
            'category' => $request->category,
            'flashcard_title' => $request->title,
            'flashcard' => $request->flashcard,
            'flashcard_backcontent' => $request->backcontent,
            'flashcard_frontcontent' => $request->frontcontent,
        ]);
        if($flashcard){
            return redirect()->route('adminflashcards');
        }
        else{

            return back();
        }

        
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
