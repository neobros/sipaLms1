<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassDetails extends Model
{
    use HasFactory;

    protected $table = 'class_detail'; 

    protected $fillable = [
        'Class_stream', 'Class_date', 'Stu_name' , 'Class_image','Class_type','Class_time','price','status', 'Teacher_ID'
    ];
}

