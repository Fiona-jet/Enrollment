<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;

class TeacherController extends Controller
{
    //
    public function index()
    {
        $teachers = Teacher::all();
        return view('admin.allteacher', compact('teachers'));
    }
    public function addteacher()
    {
        return view('admin.add_teacher');
    }
    public function saveTeacher(Request $request)
    {
        //validate the request

        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email|unique:teachers,email',
            'address' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'department' => 'required',
        ]);

        $teacher = new Teacher();

        $teacher->name = $request->name;
        $teacher->phone = $request->phone;
        $teacher->email = $request->email;
        $teacher->address = $request->address;
        $teacher->department = $request->department;

        if ($request->hasFile('image')) {
            $photo = $request->file('image');
            $filename = time() . '.' . $photo->getClientOriginalExtension();
            // Specify the path within the public disk
            $path = $photo->storeAs('uploads/teachers', $filename, 'public');
            $teacher->image = $filename; // Save the full path or just the filename, as needed
            $teacher->save();
        }

        $teacher->save();

        if(!$teacher->save()){
            return Redirect::back()->withInput()->withErrors(['error', 'Something went wrong']);
        }
        return redirect()->route('allteacher')->with('success','Teacher added successfully');
    }
}
