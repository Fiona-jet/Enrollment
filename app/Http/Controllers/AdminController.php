<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\Admin;
use App\Models\Enrollment;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Support\Facades\Session;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;


class AdminController extends Controller
{

    public function admin_dashboard()
    {
        $student = Student::all()->count();
        $teacher = Teacher::all()->count();
        $tution = Enrollment::all()->sum('tution_fee');
        $revenue = Enrollment::all()->sum('revenue');
        return view('admin.dashboard', compact('student', 'teacher', 'tution', 'revenue'));
    }

    //viewprofile
    public function viewprofile()
    {
        return view('admin.view');
    }

    public function setting()
    {
        return view('admin.setting');
    }
}
