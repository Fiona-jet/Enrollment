<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(){
        return view('student_login');
    }

    public function loginPost(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (auth()->attempt($credentials)) {
            if(auth()->user()->role == 'admin'){
                return redirect()->route('admin_dashboard');
            }else{
                return redirect()->route('student_dashboard');
            }
        }
    }

    public function register(){
        return view('register');
    }

    public function registerPost(Request $request){
        $request->validate([
            'name' => 'required',
            'roll' => 'required|unique:students|numeric',
            'fathername' => 'required',
            'mothername' => 'required',
            'email' => 'required|email|unique:students',
            'phone' => 'required',
            'address' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'password' => 'required',
            'department' => 'required',
            'admissionyear' => 'required|numeric',
        ]);

        $student = new Student();
        $student->name = $request->name;
        $student->roll = $request->roll;
        $student->fathername = $request->fathername;
        $student->mothername = $request->mothername;
        $student->email = $request->email;
        $student->phone = $request->phone;
        $student->address = $request->address;
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

        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->sid = $student->id;

        $user->save();

        if(!$user||!$student){
            return view('error');
        }

        return redirect()->route('login')->with('success', 'Regsitered successfully');
    }

    function logout(){
        session()->flush();
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect()->route('login');
    }


}
