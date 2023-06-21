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
use Illuminate\Support\Facades\Hash;
use Mail;
use DB;

class AdminsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admins= User::where('role','=','admin')->paginate(12);
        return Inertia::render('SuperAdmin/Admins/index',[
            'admins' => $admins,
            
        ]);
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('SuperAdmin/Admins/create');
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {        
        $users=User::select('*')
        ->whereIn('email',[$request->email])
        ->get();


    if($users->isNotEmpty()){
        $errormessage = 'Error!, user exist. Please use a different credential';
        return back()->with('errormessage',$errormessage);
        

    }
      
        $request->validate([
            'username' => 'required',
            'email' => 'required|string|email',
            'password' => 'required',
        ]);

        $role="admin";
        $user = User::create([
            'name' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $role,
        ]);
        if($user){
            
            $subject="Branch Spanish - Account Created";
            $data["email"]=$request->email;
            $data["username"]=$request->username;
            $data["password"]=$request->password;
            $data["subject"]=$subject;
             Mail::send('account', $data, function($message)use($data)  {
                $message->to($data["email"], $data["username"],$data["password"],
                $data["subject"])
                ->subject('Branch Spanish - Account Created Successfully');
                });
    
          $successmessage = 'Created Successsfully';
          return redirect()->route('superadmin.admin')->with('successmessage',$successmessage);
        }
        else{
    
            $errormessage = 'Error! try again';
            return back()->with('errormessage',$errormessage);
        }
    
        $errormessage = 'Error! try again';
        return back()->with('errormessage',$errormessage);
        //
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
        $deluser=User::findOrFail($id);
        
        $deluser->delete();
        
        $successmessage = 'Deleted Successsfully';
        return redirect()->route('superadmin.admin')->with('successmessage',$successmessage);
    }
}
