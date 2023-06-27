        $child =   DB::table('quiz')  
        ->join('categories', 'quiz.category_id', '=', 'categories.id')
        ->join('userscore', 'categories.id', '=', 'userscore.s_category_id')
        ->join('users', 'userscore.user_id', '=', 'users.id')
        ->join('useranswers', 'users.id', '=', 'useranswers.user_id')
    ->select('userscore.id as id', 'category_name','child_firstname','child_lastname','student_id',
    'user_score','s_category_id','user_score','score','q_total','grade','email',
    'student_status','account_status','name')
        ->where('userscore.id','=', $id)
        ->where('users.student_status','=','enrolled')
        ->where('userscore.user_id','=',$user_id)
        ->where('userscore.s_category_id','=',$btntype)
        ->where('userscore.quiz_attempt' ,'=',$att)
        ->where('useranswers.answer_attempt' ,'=',$att)->get();






