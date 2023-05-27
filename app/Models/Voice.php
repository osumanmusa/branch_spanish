<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voice extends Model
{
    use HasFactory;
    
    protected $table = "user_record";

    protected $fillable = [
        'id' ,
        'user_id' ,
        'pronounciation_id' ,
        'user_voice' ,

    ];
}
