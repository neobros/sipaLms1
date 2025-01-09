<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class student_chats extends Model
{
    use HasFactory;

    protected $table = 'student_chats'; 

    protected $fillable = [
        'type', 'message', 'stu_ID' 
    ];
}
