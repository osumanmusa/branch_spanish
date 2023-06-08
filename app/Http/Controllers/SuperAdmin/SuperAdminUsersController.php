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
use Mail;
use DB;

class SuperAdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $parents= User::where('role','=','user')->paginate(12);
        return Inertia::render('SuperAdmin/accounts',[
            'parents' => $parents,
            
        ]);
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function enroll(string $id)
    {
        $user=User::findOrFail($id);
    
        
    $parent=User::where('parent_index','=',$user->parent_index)
    ->where('role','=','parent')->first();
   if($parent->account_status == 'active'){
    
    $enroll_user = DB::table('users')
    ->where('id','=' ,$user->id)
    ->update(
        [ 
          'account_status' => 'active',
          'student_status' => 'enrolled',
      ]);

      if ($enroll_user) {
            
            $subject="Branch Spanish - Account Activated";
            $data["parent_email"]=$user->email;
            $data["parent_firstname"]=$user->child_firstname;
            $data["parent_lastname"]=$user->child_lastname;
            $data["subject"]=$subject;
             Mail::send('activate', $data, function($message)use($data)  {
                $message->to($data["parent_email"], $data["parent_firstname"],$data["parent_lastname"])
                ->subject('Branch Spanish - Account Activated Successfully');
                });
    
          $successmessage = 'Updated Successsfully';
          return redirect()->back()->with('successmessage',$successmessage);
             }else{
                $errormessage = '!Error Smething happend';
                return back()->with('errormessage',$errormessage);
    
             }
    
             $errormessage = '!Error';
             return back()->with('errormessage',$errormessage);



   }else{
        $enroll_user = DB::table('users')
        ->where('parent_index','=',$user->parent_index)
        ->update(
            [ 
              'account_status' => 'active',
              'student_status' => 'enrolled',
          ]);

          if ($enroll_user) {
            $subject="Branch Spanish - Account Activated";
            $data["parent_email"]=$parent->email;
            $data["parent_firstname"]=$parent->parent_firstname;
            $data["parent_lastname"]=$parent->parent_lastname;
            $data["subject"]=$subject;
             Mail::send('activate', $data, function($message)use($data)  {
                $message->to($data["parent_email"], $data["parent_firstname"],$data["parent_lastname"])
                ->subject('Branch Spanish - Account Activated Successfully');
                });
        
              $successmessage = 'Updated Successsfully';
              return redirect()->back()->with('successmessage',$successmessage);
                 }else{
                    $errormessage = '!Error Smething happend';
                    return back()->with('errormessage',$errormessage);
        
                 }
        
                 $errormessage = '!Error';
                 return back()->with('errormessage',$errormessage);
    
        }
        //
    }
    public function deactivate(string $id)
    {
        $user=User::findOrFail($id);
        
    
        $enroll_user = DB::table('users')
        ->where('student_id', $user->student_id)
        ->update(
            [ 
              'account_status' => 'de-active',
              'student_status' => 'suspended',
          ]);

  if ($enroll_user) {
      $successmessage = 'Updated Successsfully';
      return redirect()->back()->with('successmessage',$successmessage);
         }else{
            $errormessage = '!Error Smething happend';
            return back()->with('errormessage',$errormessage);

         }

         $errormessage = '!Error';
         return back()->with('errormessage',$errormessage);
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
