<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AddstudentsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AllstudentsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TutionController;
use App\Http\Controllers\CSEController;
use App\Http\Controllers\ECEController;
use App\Http\Controllers\BBAController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\EEEController;
use App\Http\Controllers\MBAController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//logout


Route::get('/', [AuthController::class, 'login'])->name('login');


Route::post('/', [AuthController::class, 'loginPost'])->name('loginPost');

Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'registerPost'])->name('registerPost');

Route::group(['middleware' => 'auth'], function () {
    //admin
    Route::get("/admin", [AdminController::class, 'admin_dashboard'])->name('admin_dashboard');
    Route::get("/viewprofile", [AdminController::class, 'viewprofile']);
    Route::get("/setting", [AdminController::class, 'setting']);
    Route::get("/allstudent", [StudentController::class, 'index'])->name('allstudent');


    //all routes for courses
    Route::get('/courses', [CourseController::class, 'index'])->name('courses');
    Route::get('/addcourse', [CourseController::class, 'addcourse'])->name('add-course');
    

    //all routes for teachers    
    Route::get("/allteacher", [TeacherController::class, 'allteacher']);
    Route::get("/addteacher", [TeacherController::class, 'addteacher']);
    Route::post("/save_teacher", [TeacherController::class, 'saveteacher']);



    //student
    Route::get("/home", [StudentController::class, 'index'])->name('student_dashboard');
});

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
