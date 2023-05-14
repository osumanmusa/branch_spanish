<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flashcard extends Model
{
    use HasFactory;
    
    protected $table = "flashcards";

    protected $fillable = [
        'category' ,
        'flashcard_title' ,
        'flashcard' ,
        'flashcard_backcontent' ,
        'flashcard_frontcontent' ,
    ];

}
