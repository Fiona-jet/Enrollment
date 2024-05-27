<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function admin()
    {
        $allstudent_info= Student::all();
        $manage_student=view('admin.allstudent')->with('all_student_info',$allstudent_info);
        return view('layout')->with('allstudent',$manage_student);
    }
}
