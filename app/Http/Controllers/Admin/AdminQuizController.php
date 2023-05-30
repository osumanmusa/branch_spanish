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
use App\Models\Quiz;
use DB;

class AdminQuizController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $categories= Category::select('*')->paginate(10);
        return Inertia::render('Admin/Quiz/index',[
            'categories'=> $categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories= Category::select('id','category_name')->get();
        return Inertia::render('Admin/Quiz/create',[
            'categories'=>$categories,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $questions= $request->questions;
        
    foreach ($questions as $key => $value) {
        
      
       $quiz = Quiz::create([
           'category_id' => $request->category,
           'question' => $value['quiz'],
           'answer_1' => $value['answer1'],
           'answer_2' => $value['answer2'],
           'answer_3' => $value['answer3'],
           'answer_4' => $value['answer4'],
           'answer' => $value['answer'],       
           ]);
    }
       if($quiz ){
        $successmessage = 'Created Successsfully';
        return redirect()->route('admin.quiz')->with('successmessage',$successmessage);
       }
       else{
        $errormessage = '!Error Something Happend';
        return back()->with('errormessage',$errormessage);
       }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $grades = DB::table('categories')  
        ->join('userscore', 'categories.id', '=', 'userscore.s_category_id')
        ->join('users', 'userscore.user_id', '=', 'users.id')
        ->where('s_category_id','=',$id)->paginate(15);
        
        $quizes = DB::table('categories')  
        ->join('quiz', 'categories.id', '=', 'quiz.category_id')
        ->where('category_id','=',$id)->get();
  
        return Inertia::render('Admin/Quiz/show',[
            'quizes'=>$quizes,
            'grades'=>$grades,
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
        $delquiz=Quiz::findOrFail($id);
        
        $delquiz->delete();
        $successmessage = 'Created Successsfully';
        return redirect()->route('admin.quiz')->with('successmessage',$successmessage);
    }
}
