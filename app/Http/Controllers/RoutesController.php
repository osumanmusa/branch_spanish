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
use DB;

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
        ->join('flashcards', 'categories.id', '=', 'flashcards.category_id')->where('flashcards.category_id','=',$id)->get();
        $flashcard=Flashcard::select('*')->where('flashcards.category_id','=',$id)->paginate(1);
        $category= Category::select('*')->where('id','=',$id)->get();
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
        ->join('flashcards', 'categories.id', '=', 'flashcards.category_id')
        ->join('pronounciation', 'flashcards.id', '=', 'pronounciation.flashcard_id')->where('flashcards.category_id','=',$id)->paginate(1);
        $flashcards=Flashcard::select('*')->where('flashcards.category_id','=',$id)->get();
        return Inertia::render('voice', [
            'flashcard' =>$flashcard,
            'flashcards' =>$flashcards,
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
        $successmessage='Delivered Successfully';
        return redirect()->back()->with('successmessage',$successmessage);
    }
    else{
        $errormessage='An Error Occured';
        return back()->with('errormessage',$errormessage);
    }

    }

    }

    /**
     * Show the form for creating a new resource.
     */
    public function quizme()
    {
        
        $user =  Auth::user()->id;
        $categories =  DB::table('categories')  
        ->leftjoin('userscore', 'categories.id', '=', 'userscore.s_category_id')
        ->leftjoin('users', 'userscore.user_id', '=', 'users.id')
        ->select('categories.id As id','category_name','category_image')
        ->where('userscore.s_category_id','=',null)
        ->orwhere('users.id','!=',$user)
        ->get();
        // $regged= Score::where('user_id','=',$user)->get();

        // $categories= Category::whereNotIn('id',$child->cateh)->get();
       
        return Inertia::render('quiz', [
            'categories' =>$categories,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function showquiz(string $id)
    {
        
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
        

       
        // $dbanswer= Quiz::select('id','answer')->where('category_id','=',$id)->get();
        $useranswer= $request->checkedanswer;
        $totalanswer= count($useranswer);
       $score = 0;
       foreach ($useranswer as $key => $value) {
        $dbanswer= Quiz::select('id','answer')->where('category_id','=',$id)->where('id','=',$value['questionId'])->get();
       //  dd($dbanswer[0]['answer']. ' '.$value['chossenAnswer']);
        if ($value['chossenAnswer'] == $dbanswer[0]['answer'] ) {
        $score = $score + 1;
        
       }
       
    }
    
    $t_grade= ($score/$totalanswer)*100;
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
        'q_total' => $totalanswer,
        'grade' => $grade,
    ]);
    if($storescore){
        return Inertia::render('score', [
            'score' =>$score,
            'totalanswer' => $totalanswer,
            'grade'=>$grade,
            'user_score'=>$t_grade,
        ]);
    }
    else{

        return back();
    }
    
   

        
    }

    /**
     * Display the specified resource.
     */
    public function showscore()
    {
        return Inertia::render('score');
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
