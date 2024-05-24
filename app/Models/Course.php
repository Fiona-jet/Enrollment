<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_name',
        'details',
        'course_fee',
        'course_duration',
        'course_totalclass',
        'teacher_id'
    ];
}
