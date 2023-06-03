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
        ->where('users.id','=',$id)->paginate(10);

        return Inertia::render('Admin/Students/listshow',[
            'studentquiz' => $studentquiz,
            
        ]);
        //
    }
    public function details(Request $request)
    {
        
        $student=  DB::table('categories')  
        ->join('userscore', 'categories.id', '=', 'userscore.s_category_id')
        ->join('users', 'userscore.user_id', '=', 'users.id')
        ->where('users.id','=',$request->user_id)
        ->where('categories.id' ,'=',$request->category_id)->get();

        
        
        $studentquiz=  DB::table('categories')  
        ->join('userscore', 'categories.id', '=', 'userscore.s_category_id')
        ->join('users', 'userscore.user_id', '=', 'users.id')
        ->join('useranswers', 'users.id', '=', 'useranswers.user_id')
        ->join('quiz', 'useranswers.quiz_id', '=', 'quiz.id')
        ->select('categories.id As id','category_name','category_image')
        ->where('users.id','=',$request->user_id)
        ->where('categories.id' ,'=',$request->category_id)->get();
        dd($studentquiz);

        return Inertia::render('Admin/Students/show',[
            'studentquiz' => $studentquiz,
            
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
        //
    }
}
