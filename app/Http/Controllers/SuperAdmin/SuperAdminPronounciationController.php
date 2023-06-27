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
        $pronounciation =  DB::table('categories')  
        ->join('pronounciations', 'categories.id', '=', 'pronounciations.category_id')
        ->when($request->search, function ($query, $search) {
            $query->where('flashcard_title', 'like', '%' . $search . '%')
            ->orwhere('category_name', 'like', '%' . $search . '%');
        })->paginate(15);
        return Inertia::render('SuperAdmin/Pronounciations/index',[
            'pronounciation'=> $pronounciation,

        ]);
    }
    public function main(Request $request)
    {
        $submissions = DB::table('categories')  
        ->join('pronounciations', 'categories.id', '=', 'pronounciations.category_id')
        ->join('user_record', 'pronounciations.id', '=', 'user_record.pronounciation_id')
        ->join('users', 'user_record.user_id', '=', 'users.id')->paginate(15);
        
        return Inertia::render('SuperAdmin/Pronounciations/index2',[
            'submissions'=> $submissions,

        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories= Category::select('id','category_name')->get();
        return Inertia::render('SuperAdmin/Pronounciations/create',[
            'categories'=>$categories,
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
            // 'title' => 'required',
            'flash_title' => 'required',
            'flashcard' => 'required',
            'backcontent' => 'required',
            'frontcontent' => 'required', 
        ]);
    //     if($request->hasFile('audio') ){
    //     $record = time() . '-' . $request->file('audio')->getClientOriginalName();
    //    $request->file('audio')->move(public_path('audio/'), $record);

    //     }else
    if($request->hasFile('audio')){

        $record = time() . '-' . $request->audio->getClientOriginalName();
       $request->audio->move(public_path('audio/'), $record);

    }else{
        echo json_encode(['status' => 'error' , 'message' =>'No audio file found']);
        die();
    }


        $pronounciation = Pronounciation::create([
            'category_id' => $request->category,
            // 'pronounciation_title' => $request->title,
            'pronounciation_voice' => $record,
            'flashcard_title' => $request->flash_title,
            'flashcard' => $request->flashcard,
            'flashcard_backcontent' => $request->backcontent,
            'flashcard_frontcontent' => $request->frontcontent, 
        ]);
    
        if ($pronounciation) {
         $successmessage = 'Created Successsfully';
         echo json_encode(['status' => 'success' , 'message' => $successmessage]);
        } else {
            $errormessage = '!Error Something Happened';
            
            echo json_encode(['status' => 'error' , 'message' => $errormessage]);
        }

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

    public function verify()
    {
        
        $successmessage = 'Created Successsfully';
      return redirect()->route('superadmin.pronounciation')->with('successmessage',$successmessage);
      
    }

    /**
     * Display the specified resource.
     */
    public function showpronounciation(string $id)
    {
        
        $submissions = DB::table('categories')  
        ->join('pronounciations', 'categories.id', '=', 'pronounciations.category_id')
        ->join('user_record', 'pronounciations.id', '=', 'user_record.pronounciation_id')
        ->where('user_record.user_id','=',$id)->paginate(15);
        return Inertia::render('SuperAdmin/Pronounciations/show',[
            'submissions'=> $submissions,

        ]);
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
