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
use Mail;


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
        $users=User::select('*')->where('role','!=','admin')
        ->whereIn('email',[$request->parent_email,$request->child_email])
        ->get();


    if($users->isNotEmpty()){
        $errormessage = 'Error!, user exist. Please use a different credential';
        return redirect('login')->with('errormessage',$errormessage);
        

    }
        $role='parent';
        $code=User::max('student_id');
        if($code == ""){
         $alphagen = "S0001";
         $student_id = $alphagen;
        }
        else{
         $student_id= ++$code;
        }
        $c_index=random_int(100000, 999999);
        
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
            'parent_index' => $c_index,
        ]);

        $role='user';
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
            'parent_index' => $c_index,
        ]);
        if($user){
            $subject="Branch Spanish - Account Created Successfully";
            $data["parent_email"]=$request->parent_email;
            $data["parent_firstname"]=$request->parent_firstname;
            $data["parent_lastname"]=$request->parent_lastname;
            $data["child_email"]=$request->child_email;
            $data["child_name"]=$request->child_name;
            $data["subject"]=$subject;
            $data["parent_password"]=$request->parent_password;
            $data["child_password"]=$request->child_password;
             Mail::send('regmail', $data, function($message)use($data)  {
                $message->to($data["parent_email"], $data["parent_firstname"],$data["parent_lastname"],
                $data["parent_password"],$data["child_name"],$data["child_email"],$data["child_password"])
                ->subject('Branch Spanish - Account Created Successfully');
                });
            $successmessage = 'Great!,Acccount Created Successfully. A confirmation mail will be sent shortly';
            return redirect('login')->with('successmessage',$successmessage);
        }
        else{
            $errormessage = '!Error, Something went wrong. Please try again';
            return redirect('login')->with('errormessage',$errormessage);

        }


    }
}
