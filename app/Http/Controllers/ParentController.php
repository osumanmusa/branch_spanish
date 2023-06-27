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
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Mail;


class ParentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function dashboard(Request $request)
    {  
        $parent_id =Auth::user()->parent_index;
        $child =User::where('users.parent_index','=',$parent_id)->where('role','=','user')
        ->when($request->search, function ($query, $search) {
            $query->where('child_firstname', 'like', '%' . $search . '%');
        })->paginate(15);
        
        $successmessage='Welcome';
        return Inertia::render('Parent/dashboard',[
            'child'=> $child,
            
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function quizlist(Request $request)
    { 
        $parent_id =Auth::user()->parent_index;
        $child =User::where('users.parent_index','=',$parent_id)->where('role','=','user')
        ->when($request->search, function ($query, $search) {
            $query->where('child_firstname', 'like', '%' . $search . '%');
        })->paginate(15);
        return Inertia::render('Parent/Quiz/listindex',[
            'child'=> $child,
        ]);
    }
    public function quiz(Request $request,string $id)
    { 
        $parent_id =Auth::user()->parent_index;
        $child =  DB::table('categories')  
        ->join('userscore', 'categories.id', '=', 'userscore.s_category_id')
        ->join('users', 'userscore.user_id', '=', 'users.id')
        ->select('userscore.id as id', 'category_name','child_firstname','child_lastname','student_id',
        'user_score','s_category_id','user_id','quiz_attempt')
        ->where('users.parent_index','=',$parent_id)
        ->where('userscore.user_id','=',$id)
        ->when($request->search, function ($query, $search) {
            $query->where('child_firstname', 'like', '%' . $search . '%');
        })->paginate(15);
     
        return Inertia::render('Parent/Quiz/index',[
            'child'=> $child,
        ]);
    }
    // public function quiz(Request $request)
    // { 
    //     $parent_id =Auth::user()->parent_index;
    //     $child =  DB::table('categories')  
    //     ->join('userscore', 'categories.id', '=', 'userscore.s_category_id')
    //     ->join('users', 'userscore.user_id', '=', 'users.id')
    //     ->where('users.parent_index','=',$parent_id)
    //     ->where('users.parent_index','=',$parent_id)
    //     ->when($request->search, function ($query, $search) {
    //         $query->where('child_firstname', 'like', '%' . $search . '%');
    //     })->get();
    //     return Inertia::render('Parent/Quiz/index',[
    //         'child'=> $child,
    //     ]);
    // }

    /**
     * Store a newly created resource in storage.
     */
    public function showstudent(string $id)
    {  
        $parent_id =Auth::user()->parent_index;
        $child =User::where('users.parent_index','=',$parent_id)->where('users.id','=',$id)->get();
       
        return Inertia::render('Parent/Student/show',[
            'child'=> $child,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function showquiz(string $id,string $btntype, string $user_id,string $att)
    { 
        $parent_id =Auth::user()->parent_index;
        $child =  DB::table('categories')  
        ->join('userscore', 'categories.id', '=', 'userscore.s_category_id')
        ->join('users', 'userscore.user_id', '=', 'users.id')
        ->join('useranswers', 'users.id', '=', 'useranswers.user_id')
        ->join('quiz','useranswers.quiz_id','quiz.id')
    // ->select('userscore.id as id', 'category_name','child_firstname','child_lastname','student_id',
    // 'user_score','s_category_id','user_id','user_score','score','q_total','grade','email',
    // 'student_status','account_status','name')
        ->where('users.parent_index','=',$parent_id)
        ->where('userscore.id','=', $id)
        ->where('users.student_status','=','enrolled')
        ->where('users.id','=',$user_id)
        ->where('userscore.s_category_id','=',$btntype)
            ->where('userscore.quiz_attempt' ,'=',$att)
            ->where('useranswers.answer_attempt' ,'=',$att)->get();

        return Inertia::render('Parent/Quiz/show',[
            'child'=> $child,
        ]);
        
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function addstudent()
    {      
        return Inertia::render('Parent/Student/create');
        

        //
    } 
       public function storestudent(Request $request)
    { 
        
        $parent =Auth::user();
        $request->validate([
            'email' => 'required',
            'password' => 'required',
            'firstname'=>'required',
            'lastname'=>'required',
            'school'=>'required',
        ]);
        $users=User::select('*')->where('role','!=','admin')
        ->whereIn('email',[$request->email])
        ->get();


    if($users->isNotEmpty()){
        $errormessage = '!Error, User Exist. Please Use a different credential';
        return back()->with('errormessage',$errormessage);
        

    }
        
    $code=User::max('student_id');
        if($code == ""){
         $alphagen = "S0001";
         $student_id = $alphagen;
        }
        else{
         $student_id= ++$code;
        }
        $c_index=random_int(100000, 999999);
        

        $role='user';
        $user = User::create([
            'name' =>$request->firstname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'parent_firstname' => $parent->parent_firstname,
            'parent_lastname' => $parent->parent_lastname,
            'parent_residence' => $parent->parent_residence,
            'child_firstname' => $request->firstname,
            'child_lastname' => $request->lastname,
            'child_school' => $request->school,
            'role' => $role,
            'student_id' => $student_id,
            'parent_index' => $parent->parent_index,
        ]);
        if($user){
            $subject="Branch Spanish - Account Created Successfully";
            $data["parent_email"]=$parent->email;
            $data["parent_firstname"]=$parent->parent_firstname;
            $data["parent_lastname"]=$parent->parent_lastname;
            $data["child_email"]=$request->email;
            $data["child_name"]=$request->firstname;
            $data["subject"]=$subject;
            $data["child_password"]=$request->password;
             Mail::send('parentregmail', $data, function($message)use($data)  {
                $message->to($data["parent_email"], $data["parent_firstname"],$data["parent_lastname"],
                $data["child_name"],$data["child_email"],$data["child_password"])
                ->subject('Branch Spanish - Account Created Successfully');
                });
            $successmessage = 'Great!,Account Created Successfully. A confirmation mail will be sent shortly';
            return redirect()->route('parent.home')->with('successmessage',$successmessage);
        }
        else{
            $errormessage = '!Error, Something went wrong. Please try again';
            return back()->with('errormessage',$errormessage);

        }   
        

        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function pronounciation()
    {
        $parent_id =Auth::user()->parent_index;
        $submissions = DB::table('categories')  
        ->join('pronounciations', 'categories.id', '=', 'pronounciations.category_id')
        ->join('user_record', 'pronounciations.id', '=', 'user_record.pronounciation_id')
        ->join('users', 'user_record.user_id', '=', 'users.id')
        ->where('users.parent_index','=',$parent_id)
        ->where('users.student_status','=','enrolled')->paginate(15);
        return Inertia::render('Parent/Pronounciations/index',[
            'submissions'=> $submissions,

        ]);
        //
    }
    
    public function profile()
    {
        $user_id=Auth::user()->id;
        $user=User::where('id','=',$user_id)->get();
            // dd($user);
        return Inertia::render('Parent/Profile/edit',[
            'user'=>$user,
        ]);
        //
    }

    public function storeprofile(Request $request)
    {
        $id=Auth::user()->id;
        if($request->image == ""){
            $request->validate([
                'name' => 'required',
                'email' => 'required',
            ]);
    
    
                $profile = DB::table('users')
                  ->where('id', $id)
                  ->update(
                      [ 
                        'name' => $request->name,
                        'email' => $request->email,
                    ]);
    
            if ($profile) {
                $successmessage = 'Updated Successsfully';
                return redirect()->route('parent.home')->with('successmessage',$successmessage);
                   }
        }else{
         $request->validate([
             'name' => 'required',
             'email' => 'required',
         ]);
 
         $profile_image = time() . '-' . $request->file('image')->getClientOriginalName() . '.' . $request->file('image')->extension();
         $request->file('image')->move(public_path('img/profile-img/'), $profile_image);
              $profile = DB::table('users')
               ->where('id', $id)
               ->update(
                   [ 
                     'name' => $request->name,
                     'email' => $request->email,
                     'profile_image' =>$profile_image,
                  
                 ]);
 
         if ($profile) {
            $successmessage = 'Updated Successsfully';
            return redirect()->route('parent.home')->with('successmessage',$successmessage);
            }
            else{
         
                    return back();
                }
 
         }

         return back();
        //
    }

    /**
     * Display the specified resource.
     */
    public function storepass(Request $request)
    {
        $request->validate([
            'password' =>'required',
        ]);

        $profile = DB::table('users')
              ->where('id', $id)
              ->update(
                  [ 
                    'password' => Hash::make($request->password),
                 
                ]);

        if ($profile) {
            return redirect()->route('parent.home');
               }
               else{
        
                   return back();
               }

        
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
