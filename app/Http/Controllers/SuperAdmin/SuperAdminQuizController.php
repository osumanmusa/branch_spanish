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
use DB;

class SuperAdminQuizController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $categories= Category::select('*')->paginate(10);
        return Inertia::render('SuperAdmin/Quiz/index',[
            'categories'=> $categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories= Category::select('id','category_name')->get();
        return Inertia::render('SuperAdmin/Quiz/create',[
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
        $total=Category::where('id','=',$request->category)->max('quiz_no');
        if($total == ""){
         $quiztotal = 1;
        }
        else{
         $quiztotal= ++$total;
        }
        
      $cat = DB::table('categories')
        ->where('id', $request->category)
        ->update(
            [ 
              'quiz_no' => $quiztotal,
          ]);
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
        return redirect()->route('superadmin.quiz')->with('successmessage',$successmessage);
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
  
        return Inertia::render('SuperAdmin/Quiz/show',[
            'quizes'=>$quizes,
            'grades'=>$grades,
        ]);
        //
    }

    /**
     * Show the form for editing the specified resource.
     */

    public function delquiz(string $id)
    {
        $delquiz=Quiz::findorfail($id);
        $maxquiz=Category::where('id','=',$delquiz->category_id)->max('quiz_no');
        $max=$maxquiz-1;
        $delquiz->delete();
        $updated = DB::table('categories')
                  ->where('id', $delquiz->category_id)
                  ->update(
                      [ 
                        'quiz_no' => $max,
                    ]);
        $successmessage = 'Deleted Successsfully';
        return redirect()->back()->with('successmessage',$successmessage);
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
        $delquiz=Quiz::where('category_id','=',$id);
        $max=0;
        $delquiz->delete();
        $profile = DB::table('categories')
                  ->where('id', $id)
                  ->update(
                      [ 
                        'quiz_no' => $max,
                    ]);
        $successmessage = 'Deleted Successsfully';
        return redirect()->route('superadmin.quiz')->with('successmessage',$successmessage);
    }
}

