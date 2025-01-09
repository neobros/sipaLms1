<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Student extends Authenticatable
{
    use HasFactory;

    protected $table = 'student'; 

    public function getAuthIdentifierName()
    {
        return 'Stu_email';
    }
    
    protected $fillable = [
        'Stu_email', 'Stu_image', 'Stu_name' , 'Subj_stream','username','Stu_contactnumber','parent_email','password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
