<?php

namespace App\Http\Controllers;
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
use DB;


class ParentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function dashboard()
    {   $parent_id =Auth::user()->student_id;
        $child =User::where('users.student_id','=',$parent_id)->where('role','=','user')->get();
        
        $successmessage='Welcome';
        return Inertia::render('Parent/dashboard',[
            'child'=> $child,
            ''
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function quiz(Request $request)
    {   $parent_id =Auth::user()->student_id;
        $child =  DB::table('categories')  
        ->join('userscore', 'categories.id', '=', 'userscore.s_category_id')
        ->join('users', 'userscore.user_id', '=', 'users.id')
        ->where('users.student_id','=',$parent_id)
        ->when($request->search, function ($query, $search) {
            $query->where('email', 'like', '%' . $search . '%');
        })->get();
        return Inertia::render('Parent/Quiz/index',[
            'child'=> $child,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function showstudent(string $id)
    {   $parent_id =Auth::user()->student_id;
        $child =User::where('users.student_id','=',$parent_id)->where('users.id','=',$id)->get();
        return Inertia::render('Parent/Student/show',[
            'child'=> $child,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function showquiz(string $id)
    { 
        $parent_id =Auth::user()->student_id;
        $child =  DB::table('categories')  
        ->join('userscore', 'categories.id', '=', 'userscore.s_category_id')
        ->join('users', 'userscore.user_id', '=', 'users.id')
        ->where('users.student_id','=',$parent_id)->where('users.id','=',$id)->get();
        return Inertia::render('Parent/Quiz/show',[
            'child'=> $child,
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
