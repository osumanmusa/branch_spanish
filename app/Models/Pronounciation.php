<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pronounciation extends Model
{
    use HasFactory;
    
    protected $table = "pronounciation";

    protected $fillable = [
        'category_id' ,
        'flashcard_id' ,
        'pronounciation_title' ,
        'pronounciation_voice' ,

    ];
}
