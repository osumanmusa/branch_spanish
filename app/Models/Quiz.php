<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;
    
    protected $table = "quiz";

    protected $fillable = [
        'category_id' ,
        'question' ,
        'answer_1' ,
        'answer_2' ,
        'answer_3' ,
        'answer_4' ,
        'answer' ,

    ];
}
