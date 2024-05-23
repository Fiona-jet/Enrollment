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

        if(Auth::check()){
            if(Auth::user()->role=='student'){
                return redirect()->route('student_dashboard');
            }
            return redirect()->route('admin_dashboard');
        }
        return view('student_login');
    }

    public function loginPost(Request $request) {
        // Validate the request data
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        // Attempt to authenticate the user with the given credentials
        $credentials = $request->only('email', 'password');
    
        if (auth()->attempt($credentials)) {
            // Check if the authenticated user is an admin
            if (auth()->user()->role == 'admin') {
                return redirect()->route('admin_dashboard');
            }
            return redirect()->route('student_dashboard');
        } 
        else {
             return redirect()->back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ]);
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
