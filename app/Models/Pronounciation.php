<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pronounciation extends Model
{
    use HasFactory;
    
    protected $table = "pronounciations";

    protected $fillable = [
        'category_id' ,
        'flashcard_title' ,
        'flashcard' ,
        'flashcard_frontcontent' ,
        'flashcard_backcontent' ,
        // 'pronounciation_title' ,
        'pronounciation_voice' ,

    ];
}
