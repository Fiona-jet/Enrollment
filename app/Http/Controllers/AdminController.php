<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\Admin;
use Illuminate\Support\Facades\Session;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;


class AdminController extends Controller
{

    public function admin_dashboard()
    {
        return view('admin.dashboard');
    }

    public function student_dashboard()
    {
        return view('student.dashboard');
    }

    //viewprofile
    public function viewprofile()
    {
        return view('admin.view');
    }

//setting
public function setting()
    {
        return view('admin.setting');
    }

    //logout

    public function logout()
    {
        Session::put('admin_name',null);
        Session::put('admin_id',null);

        return Redirect::to('/backend');

    }

    public function login_dashboard(Request $request)
    {
        $email = $request->admin_email;
        
        $admin = DB::table('admins_tbl')
            ->where('admin_email', $email)
            ->first();

        if ($admin && Hash::check($request->admin_password, $admin->admin_password)) {
            // Authentication passed...
            Session::put('admin_email',$admin->admin_email);
            Session::put('admin_id',$admin ->admin_id);
            return Redirect::to('/admin_dashboard');

        } else {
            Session::flash('error', 'Invalid email or password.');
            return Redirect::to('/backend');
        }
    }
}
