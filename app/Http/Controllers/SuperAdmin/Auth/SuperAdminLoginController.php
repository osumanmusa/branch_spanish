<?php

namespace App\Http\Controllers\SuperAdmin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Inertia\Response;

class SuperAdminLoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()

    {

        $this->middleware('guest')->except('logout');

    }

    public function index()
    {
        return Inertia::render('SuperAdmin/Auth/login');
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
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
     
        if(auth()->attempt(array('email' => $request['email'], 'password' => $request['password'],'role' => 'superadmin')))
        {

        if (auth()->user()->role == 'superadmin') {
            $successmessage = 'Welcome! Login Successful ';
                return redirect()->route('superadmin.home')->with('successmessage',$successmessage);
            

        }else{
            
        $errormessage = 'Error! User not Authorized';
            return redirect()->route('login')->with('errormessage',$errormessage);
            }
        }else{
        $errormessage = 'Error! Email or password incorrect ';
            return redirect()->back()->with('errormessage',$errormessage);
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
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
