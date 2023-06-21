<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    use HasFactory;
    
    protected $table = "userscore";

    protected $fillable = [
        's_category_id' ,
        'user_id' ,
        'quiz_id' ,
        'user_score' ,
        'q_total' ,
        'grade' ,
        'user_quiz_id' ,
        'score' ,

    ];
}
