<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ECEController extends Controller
{
    //
    public function ece()
    {
        $ecestudent_info=DB::table('student_tbl')->where(['student_department'=>4])->get();

        $manage_student=view('admin.ece')->with('ece_student_info',$ecestudent_info);
        return view('layout')->with('ece',$manage_student);
        return view('admin.ece');


    }
}
