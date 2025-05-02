<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AttendanceController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register')->middleware('guest');
Route::post('/register', [AuthController::class, 'register'])->middleware('guest');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login'])->middleware('guest');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    // Route::get('/dashboard', function () {
    //     // return view('dashboard.student', ['user' => auth()->user()]);
    // })->name('dashboard');
    Route::get('/students/{class?}', [StudentController::class, 'dashboard'])->name('student');
    
    Route::post('/students/store', [StudentController::class, 'store'])->name('students.store');    
    Route::get('/attendance', [AttendanceController::class, 'index'])->name('attendance');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('index');

    Route::post('/mark-attendance', [AttendanceController::class, 'store'])->name('store');


    
    
});