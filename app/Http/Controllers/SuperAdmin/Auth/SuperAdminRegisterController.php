<?php

namespace App\Http\Controllers\SuperAdmin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Inertia\Inertia;
use Inertia\Response;

class SuperAdminRegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('SuperAdmin/Auth/Register', [
            'page' => 'register',
        ]);
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
        $users=User::select('*')->where('role','=','admin')
        ->whereIn('email',[$request->email])
        ->get();


    if($users->isNotEmpty()){
        $errormessage = 'Error!, This user exist. Please use a different credential or login.';
        return back()->with('errormessage',$errormessage);
        

    }else{
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'required',
        ]);
        if($request->password!= $request->password_confirmation){
            $errormessage = 'Error!, Passwords do not match.';
            return back()->with('errormessage',$errormessage);
            
    
        }else{

            $role="superadmin";
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => $role,
            ]);

            if($user){
                $successmessage = 'Account created!, You can login now.';
                return redirect()->route('superadminlogin')->with('successmessage',$successmessage);
            }
            else{
    
                return back();
            }
        }
    }

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
        //
    }
}
