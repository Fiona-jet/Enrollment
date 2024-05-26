<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Teacher;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::all();
        return view('admin.courses',compact('courses'));
    }

    public function addcourse()
    {
        $teachers = Teacher::all();
        return view('admin.addcourse',compact('teachers'));
    }

    public function savecourse(Request $request)
    {
        //validate the request

        $request->validate([
            'name' => 'required',
            'teacher_id' => 'required',
            'details' => 'required',
            'fee' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'teacher_fee' => 'required',
            'totalclass' => 'required',
        ]);

        $course = new Course();

        $course->name = $request->name;
        $course->teacher_id = $request->teacher_id;
        $course->details = $request->details;
        $course->fee = $request->fee;
        $course->teacher_fee = $request->teacher_fee;
        $course->totalclass = $request->totalclass;

        if($request->hasFile('image')){
            $photo = $request->file('image');
            $filename = time() . '.' . $photo->getClientOriginalExtension();
            $path = $photo->storeAs('uploads/courses', $filename, 'public');
            $course->image = $filename;
            $course->save();
        }

        $course->save();

        return redirect()->route('courses')->with('success','Course added successfully');
    }
}
