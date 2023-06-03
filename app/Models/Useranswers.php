<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Useranswers extends Model
{
    use HasFactory;
    
    protected $table = "useranswers";

    protected $fillable = [
        'user_id' ,
        'quiz_id' ,
        'user_answer' ,

    ];
}
