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
use App\Models\User;
use DB;

class AdminStudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students= User::where('role','=','user')->paginate(12);
        return Inertia::render('Admin/Students/index',[
            'students' => $students,
            
        ]);
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
        $studentquiz =  DB::table('categories')  
        ->join('userscore', 'categories.id', '=', 'userscore.s_category_id')
        ->join('users', 'userscore.user_id', '=', 'users.id')
        ->select('userscore.id as id', 'category_name','child_firstname','child_lastname','student_id',
        'user_score','grade','s_category_id','user_id','quiz_attempt')
        ->where('users.id','=',$id)->paginate(10);

        return Inertia::render('Admin/Students/listshow',[
            'studentquiz' => $studentquiz,
            
        ]);
        //
    }
    public  function details(string $id,string $btntype,string $user_id,string $att)
    {
        $studentquiz=  DB::table('quiz')  
        ->join('categories', 'quiz.category_id', '=', 'categories.id')
        ->join('userscore', 'categories.id', '=', 'userscore.s_category_id')
        ->join('users', 'userscore.user_id', '=', 'users.id')
        ->join('useranswers', 'users.id', '=', 'useranswers.user_id')
            ->where('userscore.id','=', $id)
        ->where('users.student_status','=','enrolled')
        ->where('categories.id' ,'=',$btntype)
        ->where('userscore.quiz_attempt' ,'=',$att)
        ->where('useranswers.answer_attempt' ,'=',$att)
            ->where('userscore.user_id','=',$user_id)->get();
    
        return Inertia::render('Admin/Students/show',[
            'studentquiz' => $studentquiz,
            
        ]);
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function view(string $id)
    {

        $child =User::select('*')->where('role','=','user')->where('id','=',$id)->get();
        $user =User::select('*')->where('role','=','user')->where('id','=',$id)->first();
      
        $parent = User::where('role','=','parent')->where('parent_index','=',$user->parent_index)->get();
       
        return Inertia::render('Admin/Students/view',[
            'child' => $child,
            'parent' => $parent,
            
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
        //
    }
}
