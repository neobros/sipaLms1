<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RescheduleRequest extends Model
{
    use HasFactory;
    protected $fillable = [
        'class_id',
        'student_id',
        'teacher_id',
        'subject_name',
        'teacher_name',
        'reschedule_date',
        'reschedule_time',
        'note',
        'status',
        'teacher_reply',
        'link',
        'reply_date',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id', 'stu_ID');
    }

    public function class()
    {
        return $this->belongsTo(ClassDetail::class, 'class_id', 'Class_ID');
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'teacher_id', 'Teacher_ID');
    }
}
