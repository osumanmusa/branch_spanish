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
use App\Models\Voice;
use App\Models\Useranswers;
use DB;
use Illuminate\Support\Facades\Hash;
use Mail;


class RoutesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories= Category::select('*')->get();
        return Inertia::render('Welcome', [
            'categories' =>$categories
        ]);
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function flashcard()
    {
        $categories= Category::select('*')->get();
        return Inertia::render('flashcard', [
            'categories' =>$categories,
        ]);
    }

    public function card(string $id)
    {
        $flashcards = DB::table('categories')  
        ->join('flashcards', 'categories.id', '=', 'flashcards.category_id')
        ->where('flashcards.category_id','=',$id)->get();
        $flashcard=Flashcard::select('*')->where('flashcards.category_id','=',$id)->paginate(1);
        $category= Category::select('category_name')->where('id','=',$id)->first();
        return Inertia::render('card', [
            'flashcards' =>$flashcards,
            'flashcard' =>$flashcard,
            'category' =>$category,
        ]);
    }


    public function pronounciation()
    {
        $categories= Category::select('*')->get();
        return Inertia::render('pronounciation', [
            'categories' =>$categories,
        ]);
    }

    public function voice(string $id)
    {
        $flashcard = DB::table('categories')  
        ->join('pronounciations', 'categories.id', '=', 'pronounciations.category_id')
        ->where('pronounciations.category_id','=',$id)->paginate(1);
        $flashcards= DB::table('categories')  
        ->join('pronounciations', 'categories.id', '=', 'pronounciations.category_id')
        ->where('pronounciations.category_id','=',$id)->get();
        $category= Category::select('category_name')->where('id','=',$id)->first();
        return Inertia::render('voice', [
            'flashcard' =>$flashcard,
            'flashcards' =>$flashcards,
            'category' =>$category,
        ]);
    }

    public function storevoice(Request $request)
    {
        $id=$request['voiceid'];
        $user_voice=$request['audio'];
        if ($user_voice =='') {
            $errormessage='An Error Occured';
            return redirect()->back()->with('errormessage',$errormessage);
            # code...
        }else{

        $user =  Auth::user()->id;
        $record = time() . '-' . $user_voice->getClientOriginalName();
       $user_voice->move(public_path('audio/'), $record);
       
       $voice = Voice::create([
        'pronounciation_id' => $id,
        'user_voice' => $record,
        'user_id' =>$user,
    ]);
    if($voice ){
        $successmessage = 'Created Successsfully';
        echo json_encode(['status' => 'success' , 'message' => $successmessage]);
    }
    else{
        $errormessage = '!Error Something Happened';
        
        echo json_encode(['status' => 'error' , 'message' => $errormessage]);
    }

    }

    }

    /**
     * Show the form for creating a new resource.
     */
    public function quizme()
    {
        
        $user =  Auth::user()->id;
        $quizcategories= Category::select('*')->get();
        // $quizcategories = DB::table('categories')
        // ->leftJoin('userscore', 'categories.id', '=', 'userscore.s_category_id')
        // ->leftJoin('users', 'userscore.user_id', '=', 'users.id')
        // ->select('categories.id as id', 'category_name', 'category_image')
        // ->where(function ($query) use ($user) {
        // $query->where('userscore.s_category_id', '=', null)
        //     ->orWhere('userscore.user_id', '!=', $user);
        // })
        // ->get();
        
        // $quizcategories = DB::table('categories')
        // ->leftJoin('userscore', 'categories.id', '=', 'userscore.s_category_id')
        // ->leftJoin('users', 'userscore.user_id', '=', 'users.id')
        // ->select('categories.id as id', 'category_name', 'category_image')
        // ->where(function ($query) use ($user) {
        // $query->where('userscore.s_category_id', '=', null)
        //     ->orWhere('userscore.user_id', '!=', $user);
        // })
        // ->get();
        // $user =  Auth::user()->id;
        // $userscore =Score::where('user_id','=',$user)->get();

        // $quizcategories =Category::where('id','!=',$userscore->s_category_id)->get();

        // $regged= Score::where('user_id','=',$user)->get();

        // $categories= Category::whereNotIn('id',$child->cateh)->get();
       
        return Inertia::render('quiz', [
            'quizcategories' =>$quizcategories,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function showquiz(string $id)
    {
        $user =  Auth::user()->id;
        
    
            $quizes = DB::table('categories')  
            ->join('quiz', 'categories.id', '=', 'quiz.category_id')->where('quiz.category_id','=',$id)->get();
            return Inertia::render('quizme', [
                'quizes' =>$quizes,
            ]);

        
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function storequiz(Request $request, string $id)
    {
        $user =  Auth::user()->id;
        // $userscore =Score::where('user_id','=',$user)->where('s_category_id','=',$id)->first();
        
        // if($userscore==null){
   
  // $dbanswer= Quiz::select('id','answer')->where('category_id','=',$id)->get();
  $useranswer= $request->checkedanswer;
  $totalanswer= count($useranswer);
 $score = 0;
 
$atempted= Score::max('quiz_attempt');

if($atempted == null){
   $quiz_attempt=1;

}else{
   $quiz_attempt= $atempted + 1;
}


$test_answer=null;
if($useranswer == $test_answer){
    $errormessage = '!Error, some questions are not answered';
    return back()->with('errormessage',$errormessage);

}
 foreach ($useranswer as $key => $value) {
    
    if($value==$test_answer){

        $errormessage = '!Error, some questions are not answered';
        return back()->with('errormessage',$errormessage);
    
    }else{
        $dbanswer= Quiz::select('id','answer')->where('category_id','=',$id)->where('id','=',$value['questionId'])->get();

    }

 //  dd($dbanswer[0]['answer']. ' '.$value['chossenAnswer']);
  if ($value['chossenAnswer'] == $dbanswer[0]['answer'] ) {
  $score = $score + 1;
  
 }
 $userid = Auth::user()->id;
 $answerstore = Useranswers::create([
  'user_id' => $userid,
  'quiz_id' => $value['questionId'],
  'user_answer' => $value['chossenAnswer'],
  'answer_attempt' => $quiz_attempt,

]);

 
}





$temp_grade= ($score/$totalanswer)*100;
$t_grade= round($temp_grade);
if ($t_grade >= '90' ) {
  $grade='A+';
}
else if ($t_grade >=80 && $t_grade<=89) {
  $grade='B+';
}
else if ($t_grade >= 70 && $t_grade<=79) {
  $grade='B-';
}
else if ($t_grade >= 60 && $t_grade<=69) {
  $grade='B';
}
else if ($t_grade >= 50  && $t_grade<=9) {
  $grade='C';
}
else if ($t_grade >= 40  && $t_grade<=49) {
  $grade='D';
}
else {
  $grade='F';
}


$user =  User::find(Auth::user()->id);


$storescore = Score::create([
  's_category_id' => $id,
  'user_id' => $user->id,
  'user_score' => $t_grade,
  'score' => $score,
  'q_total' => $totalanswer,
  'grade' => $grade,
  'quiz_attempt' => $quiz_attempt,
]);
if($storescore){
  return redirect()->route('user.score');
//   return Inertia::render('score', [
//       'score' =>$score,
//       'totalanswer' => $totalanswer,
//       'grade'=>$grade,
//       'user_score'=>$t_grade,
//   ]);
}
else{

    $errormessage = '!Error, something went wrong';
    return back()->with('errormessage',$errormessage);
}

    //    }else{
          
    //     $errormessage = '!Error, can not take quiz twice';
    //     return redirect()->back()->with('errormessage',$errormessage);
    //    }
        
      
    
   

        
    }

    /**
     * Display the specified resource.
     */
    public function showscore()
    {
        $user =  Auth::user()->id;
        $results =Score::where('user_id','=',$user)
        ->orderBy('id', 'desc')
        ->first();
        if($results == null){
            return redirect() ->route('welcome');
        }else{

        // dd($results); 
        return Inertia::render('score', [
            'results' =>$results,
        ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function verify()
    {
        
        $successmessage = 'Upload Successsful';
        return redirect()->back()->with('successmessage',$successmessage);
    }

    /**
     * Update the specified resource in storage.
     */
    public function resetpass(Request $request)
    {
        $users=User::where('email','=',$request->email)->first();



    if($users){
        
        
        $password=random_int(100000, 999999);
        $reset_user = DB::table('users')
        ->where('id','=', $users->id)
        ->update(
            [ 
              'password' => Hash::make($password),
          ]);
   if ($reset_user) {
    $subject="Branch Spanish - Password Reset";
    $data["parent_email"]=$request->email;
    $data["subject"]=$subject;
    $data["user_name"]=$users->name;
    $data["password"]=$password;
     Mail::send('reset', $data, function($message)use($data)  {
        $message->to($data["parent_email"],$data["user_name"], $data["password"],
        $data["subject"])
        ->subject('Branch Spanish - Password Reset Successful');
        });
    $successmessage = 'Great!,Password Reset Successfully. A confirmation mail will be sent shortly';
    return redirect()->back()->with('successmessage',$successmessage);
         }else{
            $errormessage = '!Error Smething happend';
            return back()->with('errormessage',$errormessage);

         }

         $errormessage = '!Error';
         return back()->with('errormessage',$errormessage);
        

    }else{
        $errormessage = '!Error Smething happend';
        return back()->with('errormessage',$errormessage);

     }
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    // public function profile()
    // {
    //     //
    //     return Inertia::render('profile');
    // }
    // public function saveprofile(Request $request)
    // {
    //     $id =  Auth::user()->id;
        
    //     $profile_image = time() . '-' . $request->file('image')->getClientOriginalName() . '.' . $request->file('image')->extension();
    //     $request->file('image')->move(public_path('img/profile-img/'), $profile_image);
    //          $profile = DB::table('users')
    //           ->where('id', $id)
    //           ->update(
    //               [ 
    //                 'profile_image' =>$profile_image,
                 
    //             ]);

    //     if ($profile) {
    //        $successmessage = 'Updated Successsfully';
    //        return redirect()->back()->with('successmessage',$successmessage);
    //        }
    //        else{
    //         $errormessage = 'Error! Something went wrong.';
        
    //                return back()->with('errormessage',$errormessage);
    //            }
    // }

    public function userdash()
    {
        
        $id =  Auth::user()->id;
        $voice = DB::table('categories')  
        ->join('pronounciations', 'categories.id', '=', 'pronounciations.category_id')
        ->join('user_record', 'pronounciations.id', '=', 'user_record.pronounciation_id')
        ->join('users', 'user_record.user_id', '=', 'users.id')
        ->where('user_record.user_id','=',$id)->count();
        
        $quiz =  DB::table('categories')  
        ->join('userscore', 'categories.id', '=', 'userscore.s_category_id')
        ->join('users', 'userscore.user_id', '=', 'users.id')
        ->where('users.student_status','=','enrolled')
        ->where('users.id','=',$id)->count();
        return Inertia::render('Users/dashboard',[
            'voice'=> $voice,
            'quiz'=> $quiz,


        ]);
    }

    public function userpronounciation()
    {
        
        $id =  Auth::user()->id;
        $submissions = DB::table('categories')  
        ->join('pronounciations', 'categories.id', '=', 'pronounciations.category_id')
        ->join('user_record', 'pronounciations.id', '=', 'user_record.pronounciation_id')
        ->join('users', 'user_record.user_id', '=', 'users.id')
        ->where('user_record.user_id','=',$id)->paginate(15);
        return Inertia::render('Users/Pronounciations/index',[
            'submissions'=> $submissions,


        ]);
    }

    public function userquiz(Request $request)
    {
        
        $id =  Auth::user()->id;
        $child =  DB::table('categories')  
        ->join('userscore', 'categories.id', '=', 'userscore.s_category_id')
        ->join('users', 'userscore.user_id', '=', 'users.id')
        ->select('userscore.id as id', 'category_name','child_firstname','child_lastname','student_id',
        'user_score','grade','s_category_id','user_id','quiz_attempt')
    ->where('userscore.user_id', '=', $id)
    ->paginate(15);

        // dd($child);
        return Inertia::render('Users/Quiz/index',[
            'child'=> $child,


        ]);    
    }

    public function userreg()
    {
        return Inertia::render('Auth/Userreg');    
    }
    public function reguser(Request $request)
    {
        
        
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);
        $users=User::select('*')->where('role','!=','admin')
        ->whereIn('email',[$request->email])
        ->get();


    if($users->isNotEmpty()){
        $errormessage = 'Error!, user exist. Please use a different credential';
        return redirect('login')->with('errormessage',$errormessage);
        

    }
    $profile_parent = time() . '-' . $request->file('image')->getClientOriginalName() . '.' . $request->file('image')->extension();
    $request->file('image')->move(public_path('img/profile-img/'), $profile_parent);


        $role='user';
        $code=User::max('student_id');
        if($code == ""){
         $alphagen = "S0001";
         $student_id = $alphagen;
        }
        else{
         $student_id= ++$code;
        }
        
        $user = User::create([
            'child_firstname' => $request->firstname,
            'child_lastname' => $request->lastname,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'profile_image'=>$profile_parent,
            'role' => $role,
            'student_id' => $student_id,
        ]);

        if($user){
            $subject="Branch Spanish - Account Created Successfully";
            $data["parent_email"]=$request->email;
            $data["parent_firstname"]=$request->firstname;
            $data["parent_lastname"]=$request->lastname;
            $data["subject"]=$subject;
            $data["parent_password"]=$request->password;
             Mail::send('registermail', $data, function($message)use($data)  {
                $message->to($data["parent_email"], $data["parent_firstname"],$data["parent_lastname"],
                $data["parent_password"])
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
    public function profile()
    {
        $user_id=Auth::user()->id;
        $user=User::where('id','=',$user_id)->get();
            // dd($user);
        return Inertia::render('Users/Profile/edit',[
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
                return redirect()->route('user.dashboard')->with('successmessage',$successmessage);
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
            return redirect()->route('user.dashboard')->with('successmessage',$successmessage);
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
    public function passstore(Request $request)
    {
        $id=Auth::user()->id;
        $request->validate([
            'password' =>'required',
        ]);

        $profile = DB::table('users')
              ->where('id', $id)
              ->where('role', 'user')
              ->update(
                  [ 
                    'password' => Hash::make($request->password),
                 
                ]);

        if ($profile) {
            $successmessage = 'Updated Successsfully';
            return redirect()->route('user.dashboard')->with('successmessage',$successmessage);
               }
               else{
        
                   return back();
               }

        
        //
    }
    public function viewquiz(string $id,string $btntype,string $user_id,string $att)
    { 
        $us_id=Auth::user()->id;
        
        $child =  DB::table('categories')  
        ->join('userscore', 'categories.id', '=', 'userscore.s_category_id')
        ->join('users', 'userscore.user_id', '=', 'users.id')
            ->join('useranswers', 'users.id', '=', 'useranswers.user_id')
            ->join('quiz','useranswers.quiz_id','quiz.id')
    // ->select('userscore.id as id', 'category_name','child_firstname','child_lastname','student_id',
    // 'user_score','s_category_id','user_score','score','q_total','grade','email',
    // 'student_status','account_status','name')
        ->where('userscore.id','=', $id)
        ->where('users.student_status','=','enrolled')
        ->where('users.id','=',$user_id)
        ->where('userscore.s_category_id','=',$btntype)
            ->where('userscore.quiz_attempt' ,'=',$att)
            ->where('useranswers.answer_attempt' ,'=',$att)->get();
        // dd($child);
        return Inertia::render('Users/Quiz/show',[
            'child'=> $child,
        ]);
        
    //     //
    //     $child =   DB::table('quiz')  
    //     ->join('categories', 'quiz.category_id', '=', 'categories.id')
    //     ->join('userscore', 'categories.id', '=', 'userscore.s_category_id')
    //     ->join('users', 'userscore.user_id', '=', 'users.id')
    //     ->join('useranswers', 'users.id', '=', 'useranswers.user_id')
    // ->select('userscore.id as id', 'category_name','child_firstname','child_lastname','student_id',
    // 'user_score','s_category_id','user_score','score','q_total','grade','email',
    // 'student_status','account_status','name')
    //     ->where('userscore.id','=', $id)
    //     ->where('users.student_status','=','enrolled')
    //     ->where('userscore.user_id','=',$user_id)
    //     ->where('userscore.s_category_id','=',$btntype)
    //     ->where('userscore.quiz_attempt' ,'=',$att)
    //     ->where('useranswers.answer_attempt' ,'=',$att)->get();
    }



}
