<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use HasFactory;

    protected $table = 'admin'; 

    public function getAuthIdentifierName()
    {
        return 'username';
    }
    
    protected $fillable = [
        'username', 'password', 
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}

