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
use App\Http\Controllers\EEEController;
use App\Http\Controllers\MBAController;
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
    Route::get("/admin_dashboard", [AdminController::class, 'admin_dashboard']);

    Route::get("/viewprofile", [AdminController::class, 'viewprofile']);
    Route::get("/setting", [AdminController::class, 'setting']);

    //addstudent
    Route::get("/addstudent", [AddstudentsController::class, 'addstudent']);
    Route::post("/save_student", [AddstudentsController::class, 'savestudent']);
    Route::get("/student_delete/{student_id}", [AllstudentsController::class, 'studentdelete']);
    Route::get("/student_view/{student_id}", [AllstudentsController::class, 'studentview']);
    Route::get("/student_edit/{student_id}", [AllstudentsController::class, 'studentedit']);
    Route::post("/updatae_student/{student_id}", [AllstudentsController::class, 'studentupdate']);



    Route::get("/allstudent", [AllstudentsController::class, 'allstudent']);
    Route::get("/tutionfee", [TutionController::class, 'tution']);
    Route::get("/cse", [CSEController::class, 'cse']);
    Route::get("/ece", [ECEController::class, 'ece']);
    Route::get("/bba", [BBAController::class, 'bba']);
    Route::get("/eee", [EEEController::class, 'eee']);
    Route::get("/mba", [MBAController::class, 'mba']);
    Route::get("/allteacher", [TeacherController::class, 'allteacher']);
    Route::get("/addteacher", [TeacherController::class, 'addteacher']);
    Route::post("/save_teacher", [TeacherController::class, 'saveteacher']);
});

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
