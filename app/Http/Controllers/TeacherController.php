<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;

class TeacherController extends Controller
{
    //
    public function allteacher()
    {
        $allteacher_info=DB::table('teachers_tbl')->get();

        $manage_teacher=view('admin.allteacher')->with('all_teacher_info',$allteacher_info);
        return view('layout')->with('allteacher',$manage_teacher);

    }
    public function addteacher()
    {
        return view('admin.add_teacher');

    }
    public function saveteacher(Request $request)
    {

        $data=array();
        $data['teachers_name']=$request->teachers_name;
        $data['teachers_phone']=$request->teachers_phone;
        $data['teachers_address']=$request->teachers_address;
        $data['teachers_department']=$request->teachers_department;
        $image=$request->file('teachers_image');


        if ($image) {
            $image_name = Str::random(20);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'image/';
            $image_url = $upload_path . $image_full_name;
            $success = $image->move($upload_path, $image_full_name);
            if ($success) {
                $data['teachers_image'] = $image_url;
            }
        }

        DB::table('teachers_tbl')->insert($data);
        Session::flash('success', 'Teacher Added Successfully'); // Flash a success message
        return Redirect::to('/addteacher'); 

    }
}
