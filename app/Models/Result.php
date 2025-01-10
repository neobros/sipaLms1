<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;
    protected $table = 'results'; 

    protected $fillable = [
        'quizzes_ID', 'stu_ID', 'marks' ,'Class_type' ,'subj_stream' ,'Teach_name' 
    ];
}
