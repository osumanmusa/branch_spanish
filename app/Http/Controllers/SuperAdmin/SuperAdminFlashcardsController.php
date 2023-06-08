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
use DB;

class SuperAdminFlashcardsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $flashcards = DB::table('categories')  
        ->join('flashcards', 'categories.id', '=', 'flashcards.category_id')
        ->when($request->search, function ($query, $search) {
            $query->where('flashcard_title', 'like', '%' . $search . '%')
            ->orwhere('category_name', 'like', '%' . $search . '%');
        })->paginate(10);
        
        return Inertia::render('SuperAdmin/Flashcards/index',[
            'flashcards'=> $flashcards

        ]);
        
       
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories= Category::select('id','category_name')->get();
        return Inertia::render('SuperAdmin/Flashcards/create',[
            'categories'=> $categories

        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        


        $flashcards= $request->flashcards;
        
        
    foreach ($flashcards as $key => $value) {

        $flashcard = Flashcard::create([
           'category_id' => $request->category,
           'flashcard_title' => $value['title'],
           'flashcard' => $value['flashcard'],
           'flashcard_backcontent' => $value['backcontent'],
           'flashcard_frontcontent' => $value['frontcontent'],     
           ]);
    }
       if($flashcard ){
        $successmessage = 'Created Successsfully';
        return redirect()->route('superadminflashcards')->with('successmessage',$successmessage);
       }
       else{
        $errormessage = 'Created Successsfully';
        return back()->with('errormessage',$errormessage);
        
       }
      
        // $request->validate([
        //     'category' => 'required',
        //     'title' => 'required',
        //     'flashcard' => 'required',
        //     'backcontent' => 'required',
        //     'frontcontent' => 'required',
        // ]);


        
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
        $flashcard=Flashcard::findOrFail($id);
        $category = Category::where('category_name','=',$flashcard->id);

        return Inertia::render('SuperAdmin/Flashcards/create', [
            'flashcard' => $flashcard,
            'category' =>'category'
        ]);

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
        $delflashcard=Flashcard::findOrFail($id);
        
        $delflashcard->delete();
        
        $successmessage = 'Deleted Successsfully';
        return redirect()->route('superadminflashcards')->with('successmessage',$successmessage);
    }
}
