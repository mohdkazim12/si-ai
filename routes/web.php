<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\UserController;
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
    // StudentController
    Route::group(['prefix' => 'student'], function () {
        Route::get('/{class?}', [StudentController::class, 'dashboard'])->name('student');
        Route::post('/store', [StudentController::class, 'store'])->name('students.store');
        Route::get('/users/{id}', [StudentController::class, 'show']);
    });

    // AttendanceController
    Route::group(['prefix' => 'attendance'], function () {
        Route::get('/', [AttendanceController::class, 'index'])->name('attendance');
        Route::post('/mark', [AttendanceController::class, 'store'])->name('store');
        Route::get('/details', [AttendanceController::class, 'attendanceDetails']);
        Route::get('/studentDetails', [StudentController::class, 'studentDetails']);
    });

    // DashboardController
    Route::group(['prefix' => 'dashboard'], function () {
        Route::get('/', [DashboardController::class, 'index'])->name('index');
    });

    Route::group(['prefix' => 'users'], function () {
        Route::get('/all-user', [UserController::class, 'allUsers'])->name('all-user');
        // search table Realtime data
        Route::get('/data', [UserController::class, 'getUsers']);
    });

    // web.php or api.php
    Route::get('/students/{id}', [StudentController::class, 'show'])->name('students.show');
Route::post('/students', [StudentController::class, 'store'])->name('students.store');
Route::put('/students/{id}', [StudentController::class, 'update'])->name('students.update');


    
});