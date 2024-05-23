<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;


class AllstudentsController extends Controller
{
    //
    public function allstudent()
    {
        $allstudent_info=DB::table('student_tbl')->get();

        $manage_student=view('admin.allstudent')->with('all_student_info',$allstudent_info);
        return view('layout')->with('allstudent',$manage_student);

    }
    public function studentdelete($student_id)
    {

        DB::table('student_tbl')->where('student_id',$student_id)->delete();

        return Redirect::to('/allstudent');
    }

    public function studentview($student_id){
        $student_description_view=DB::table('student_tbl')->select('*')->where('student_id',$student_id)->first();

        $manage_description_student=view('admin.view')->with('student_description_profile',$student_description_view);
        return view('layout')->with('view',$manage_description_student);
    }
    public function studentedit($student_id)
    {

        $student_description_view=DB::table('student_tbl')->select('*')->where('student_id',$student_id)->first();
          
        $manage_description_student=view('admin.student_edit')->with('student_description_profile',$student_description_view);
        return view('layout')->with('student_edit',$manage_description_student);
    }


    public function studentupdate(Request $request,$student_id){

        $data=array();
        $data['student_name']=$request->student_name;
        $data['student_roll']=$request->student_roll;
        $data['student_fathername']=$request->student_fathername;
        $data['student_mothername']=$request->student_mothername;
        $data['student_email']=$request->student_email;
        $data['student_phone']=$request->student_phone;
        $data['student_address']=$request->student_address;
        $data['student_password']=$request->student_password;
        $data['student_admissionyear']=$request->student_admissionyear;




        $image = $request->file('student_image');
        
        if ($image) {
            // Generate a random string for image name
            $image_name = Str::random(20);

            // Get file extension
            $ext = strtolower($image->getClientOriginalExtension());

            // Construct image full name
            $image_full_name = $image_name . '.' . $ext;

            // Define upload path
            $upload_path = 'image/';

            // Construct image URL
            $image_url = $upload_path . $image_full_name;

            // Move uploaded file to designated upload path
            $success = $image->move($upload_path, $image_full_name);

            if ($success) {
                // Set student_image field in data array
                $data['student_image'] = $image_url;
            }
        }





        DB::table('student_tbl')
        ->where('student_id',$student_id)
        ->update($data);

        Session::flash('success', 'Student Updated Successfully');

        return Redirect::to('/allstudent');

    }

}
