<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function admin()
    {
        $allstudent_info= Student::all();
        $manage_student=view('admin.allstudent')->with('all_student_info',$allstudent_info);
        return view('layout')->with('allstudent',$manage_student);
    }

    public function index()
    {
        $courses = Course::all();
        return view('student.dashboard', compact('courses'));
    }

    public function viewprofile()
    {
        return view('student.profile');
    }

    public function updateprofile(Request $request)
    {
        //validation
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'roll' => 'required',
            'password' => 'required',
            'fathername' => 'required',
            'mothername' => 'required',
            'department' => 'required',
            'admissionyear' => 'required',
        ]);

        $student = Student::findOrFail(auth()->user()->sid);

        $student->name = $request->name;
        $student->email = $request->email;
        $student->phone = $request->phone;
        $student->address = $request->address;
        $student->roll = $request->roll;
        $student->fathername = $request->fathername;
        $student->mothername = $request->mothername;
        $student->department = $request->department;
        $student->admissionyear = $request->admissionyear;

        if($request->hasFile('image')){
            $photo = $request->file('image');
            $filename = time() . '.' . $photo->getClientOriginalExtension();
            $path = $photo->storeAs('uploads/students', $filename, 'public');
            $student->image = $filename;
            $student->save();
        }

        $student->save();

        $user = User::findOrFail(auth()->id());

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        return redirect()->route('student_dashboard')->with('success', 'Profile updated successfully');
    }

    public function show($id)
    {
        $course = Course::findOrFail($id);
        return view('student.details', compact('course'));
    }
}
