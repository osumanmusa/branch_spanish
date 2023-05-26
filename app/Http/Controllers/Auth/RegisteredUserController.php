<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Inertia\Inertia;
use Inertia\Response;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): Response
    {
        return Inertia::render('Auth/Register', [
            'page' => 'register',
        ]);
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'parent_name' => 'required',
            'parent_email' => 'required',
            'parent_password' => 'required',
            'child_email' => 'required',
            'child_password' => 'required',
            'parent_firstname'=>'required',
            'parent_lastname'=>'required',
            'parent_residence'=>'required',
            'child_firstname'=>'required',
            'child_lastname'=>'required',
            'child_school'=>'required',
        ]);

        $role='parent';
        $code=User::max('student_id');
        if($code == ""){
         $alphagen = "S0001";
         $student_id = $alphagen;
        }
        else{
         $student_id= ++$code;
        }
        
        $user = User::create([
            'name' => $request->parent_name,
            'email' => $request->parent_email,
            'password' => Hash::make($request->parent_password),
            'parent_firstname' => $request->parent_firstname,
            'parent_lastname' => $request->parent_lastname,
            'parent_residence' => $request->parent_residence,
            'child_firstname' => $request->child_firstname,
            'child_lastname' => $request->child_lastname,
            'child_school' => $request->child_school,
            'role' => $role,
            'student_id' => $student_id,
        ]);

        $role='user';
        $status='Enrolled';
        $user = User::create([
            'name' =>$request->child_firstname,
            'email' => $request->child_email,
            'password' => Hash::make($request->child_password),
            'parent_firstname' => $request->parent_firstname,
            'parent_lastname' => $request->parent_lastname,
            'parent_residence' => $request->parent_residence,
            'child_firstname' => $request->child_firstname,
            'child_lastname' => $request->child_lastname,
            'child_school' => $request->child_school,
            'role' => $role,
            'student_id' => $student_id,
            'student_status' => $status,
        ]);
        if($user){
            return redirect()->route('login');
        }
        else{

            return back();
        }


    }
}
