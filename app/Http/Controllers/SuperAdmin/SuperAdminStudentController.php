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
use DB;

class SuperAdminStudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students= User::where('role','=','user')->paginate(12);
        return Inertia::render('SuperAdmin/Students/index',[
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

        return Inertia::render('SuperAdmin/Students/listshow',[
            'studentquiz' => $studentquiz,
            
        ]);
        //
    }
    public function details(string $id,string $btntype)
    {
        $studentquiz=  DB::table('categories')  
        ->join('userscore', 'categories.id', '=', 'userscore.s_category_id')
        ->join('users', 'userscore.user_id', '=', 'users.id')
        ->join('useranswers', 'users.id', '=', 'useranswers.user_id')
        ->join('quiz', 'useranswers.quiz_id', '=', 'quiz.id')
        ->where('users.id','=',$id)
        ->where('categories.id' ,'=',$btntype)
        ->where('userscore.s_category_id' ,'=',$btntype)
        ->where('quiz.category_id' ,'=',$btntype)->get();

        return Inertia::render('SuperAdmin/Students/show',[
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
