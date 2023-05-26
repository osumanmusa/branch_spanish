<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Inertia\Response;
use App\Models\Flashcard;
use App\Models\Category;
use App\Models\Pronounciation;
use DB;

class AdminPronounciationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pronounciation = DB::table('categories')  
        ->join('flashcards', 'categories.id', '=', 'flashcards.category_id')
        ->join('pronounciation', 'flashcards.id', '=', 'pronounciation.flashcard_id')->paginate(15);
        return Inertia::render('Admin/Pronounciations/index',[
            'pronounciation'=> $pronounciation

        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $flashcards = Flashcard::select('id','flashcard_title')->get();
        $categories= Category::select('id','category_name')->get();
        return Inertia::render('Admin/Pronounciations/create',[
            'categories'=>$categories,
            'flashcards' => $flashcards
        ]);
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required',
            'flashcard' => 'required',
            'title' => 'required',
        ]);
        $record = time() . '-' . $request->file('audio')->getClientOriginalName();
       $request->file('audio')->move(public_path('audio/'), $record);


       $pronounciation = Pronounciation::create([
           'flashcard_id' => $request->flashcard,
           'category_id' => $request->category,
           'pronounciation_title' => $request->title,
           'pronounciation_voice' => $record,
       ]);
       if($pronounciation ){
           return redirect()->route('admin.pronounciation');
       }
       else{

           return back();
       }
        //
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
        $delpronounciation=Pronounciation::findOrFail($id);
        
        $delpronounciation->delete();
        return redirect()->route('admin.pronounciation');
    }
}
