<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RescheduleRequest extends Model
{
    use HasFactory;
    protected $fillable = [
        'student_id',
        'class_id',
        'teacher_name',
        'subject_name',
        'reschedule_date',
        'reschedule_time',
        'note',
        'status',
        'teacher_reply',
        'updated_link',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id', 'stu_ID');
    }

    // Relationship with Class
    public function class()
    {
        return $this->belongsTo(ClassDetail::class, 'class_id', 'Class_ID');
    }
}
