<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;

class AddstudentsController extends Controller
{
    public function addstudent()
    {
        return view('admin.addstudent');
    }

    public function savestudent(Request $request)
    {
        // Validation can be added here
        $data = $request->only([
            'student_name', 'student_roll', 'student_fathername', 
            'student_mothername', 'student_email', 'student_phone', 
            'student_address', 'student_password', 'student_admissionyear', 
            'student_department'
        ]);

        $image = $request->file('student_image');
        if ($image) {
            $image_name = Str::random(20);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'image/';
            $image_url = $upload_path . $image_full_name;
            $success = $image->move($upload_path, $image_full_name);
            if ($success) {
                $data['student_image'] = $image_url;
            }
        }

        DB::table('student_tbl')->insert($data);
        Session::flash('success', 'Student Added Successfully'); // Flash a success message
        return Redirect::to('/addstudent');
        
    }
}
