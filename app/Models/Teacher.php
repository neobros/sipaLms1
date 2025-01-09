<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Teacher extends Authenticatable
{
    use HasFactory;

    protected $table = 'teacher'; 

    public function getAuthIdentifierName()
    {
        return 'username';
    }
    
    protected $fillable = [
        'Teacher_CV', 'Status', 'Teach_address' , 'Teach_name','Teach_email','password','Teach_phone','username','Teach_image', 'Teach_stream','Teach_nic'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
