<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $table = 'reservation'; 

    protected $primaryKey = 'Reservation_ID';
    public $incrementing = true;
    
    protected $fillable = [
        'Class_ID', 'Teacher_ID', 'Subj_ID' , 'Re_Status','Date_reservation', 'stu_ID'
    ];
}
