<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Inertia\Response;
use App\Models\Flashcard;
use App\Models\Category;
use App\Models\Pronounciation;
use App\Models\Quiz;
use App\Models\User;
use App\Models\Score;
use App\Models\Voice;
use DB;

class SuperAdminPronounciationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $pronounciation = DB::table('categories')  
        ->join('flashcards', 'categories.id', '=', 'flashcards.category_id')
        ->join('pronounciations', 'flashcards.id', '=', 'pronounciations.flashcard_id')
        ->when($request->search, function ($query, $search) {
            $query->where('flashcard_title', 'like', '%' . $search . '%')
            ->orwhere('category_name', 'like', '%' . $search . '%');
        })->paginate(15);
        $submissions = DB::table('categories')  
        ->join('flashcards', 'categories.id', '=', 'flashcards.category_id')
        ->join('pronounciations', 'flashcards.id', '=', 'pronounciations.flashcard_id')
        ->join('user_record', 'pronounciations.id', '=', 'user_record.pronounciation_id')->paginate(15);
        return Inertia::render('SuperAdmin/Pronounciations/index',[
            'pronounciation'=> $pronounciation,
            'submissions'=> $submissions,

        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $flashcards = Flashcard::select('id','flashcard_title')->get();
        $categories= Category::select('id','category_name')->get();
        return Inertia::render('SuperAdmin/Pronounciations/create',[
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
    //     if($request->hasFile('audio') ){
    //     $record = time() . '-' . $request->file('audio')->getClientOriginalName();
    //    $request->file('audio')->move(public_path('audio/'), $record);

    //     }else
    if($request->hasFile('recordfile')){

            $record = time() . '-' . $request->recordfile->getClientOriginalName();
           $request->recordfile->move(public_path('audio/'), $record);

        }

        $pronounciation = Pronounciation::create([
            'flashcard_id' => $request->flashcard,
            'category_id' => $request->category,
            'pronounciation_title' => $request->title,
            'pronounciation_voice' => $record,
        ]);
    
        if ($pronounciation) {
            $successmessage = 'Created Successfully';
            return back()->with('successmessage', $successmessage);
        } else {
            $errormessage = '!Error Something Happened';
            return back()->with('errormessage', $errormessage);
        }
        $errormessage = '!Error Something Happened';
        return back()->with('errormessage', $errormessage);


        //     $request->validate([
    //         'category' => 'required',
    //         'flashcard' => 'required',
    //         'title' => 'required',
    //     ]);
    //     $record = time() . '-' . $request->file('audio')->getClientOriginalName();
    //    $request->file('audio')->move(public_path('audio/'), $record);


    //    $pronounciation = Pronounciation::create([
    //        'flashcard_id' => $request->flashcard,
    //        'category_id' => $request->category,
    //        'pronounciation_title' => $request->title,
    //        'pronounciation_voice' => $record,
    //    ]);
    //    if($pronounciation ){
    //     $successmessage = 'Created Successsfully';
    //     return redirect()->route('superadmin.pronounciation')->with('successmessage',$successmessage);
    //    }
    //    else{
    //     $errormessage = '!Error Something Happend';
    //     return back()->with('errormessage',$errormessage);
    //    }
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
        
        $successmessage = 'Deleted Successsfully';
        return redirect()->route('superadmin.pronounciation')->with('successmessage',$successmessage);
    }
}