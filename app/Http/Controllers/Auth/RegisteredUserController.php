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
    public function store(Request $request): RedirectResponse
    {
        dd($request);
        $request->validate([
            'parent_name' => 'required|string|max:255',
            'parent_email' => 'required|string|email|max:255|unique:'.User::class,
            'parent_password' => ['required', 'confirmed', Rules\Password::defaults()],
            'child_name' => 'required|string|max:255',
            'child_email' => 'required|string|email|max:255|unique:'.User::class,
            'child_password' => ['required', 'confirmed', Rules\Password::defaults()],
            'parent_firstname'=>'required|string|max:255',
            'parent_lastname'=>'required|string|max:255',
            'parent_residence'=>'required|string|max:255',
            'child_firstname'=>'required|string|max:255',
            'child_lastname'=>'required|string|max:255',
            'child_school'=>'required|string|max:255',
        ]);

        $role='guest';

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
        ]);

        $role='user';

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
        ]);


        return redirect()->route('login');
    }
}
