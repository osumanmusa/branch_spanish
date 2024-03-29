<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Inertia\Response;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    
    public function create(): Response
    {
        return Inertia::render('Auth/Login', [
            'canResetPassword' => Route::has('password.request'),
            'page' => 'login',
        ]);
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
     $active='active';
        if(auth()->attempt(array('email' => $request['email'], 'password' => $request['password'], 'account_status' => $active)))
        {

        if (auth()->user()->role == 'parent') {
            $successmessage = 'Welcome! Login Successful ';
                return redirect()->route('parent.home')->with('successmessage',$successmessage);
            

        }elseif(auth()->user()->role == 'user') {
            return redirect()->route('welcome');

        }else{
            
            return redirect()->route('login');
        }
        }else{
            $errormessage = '!Error User not Authorised. Contact admin';
            return back()->with('errormessage',$errormessage);
        }

    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
