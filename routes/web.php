<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\Student;
use Carbon\Carbon;

use App\Http\Controllers\StudentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\DashboardController;

use App\Http\Controllers\ReportController;




Route::middleware(['auth'])->group(function(){
    Route::get('reports/enrollments/excel', [ReportController::class,'enrollmentsExcel'])->name('reports.enrollments.excel');
    Route::get('reports/enrollments/pdf', [ReportController::class,'enrollmentsPDF'])->name('reports.enrollments.pdf');


    });

Route::middleware(['auth'])->group(function () {
    Route::resource('students', StudentController::class);
    Route::resource('courses', CourseController::class);
    Route::resource('staff', StaffController::class);
    Route::resource('inventory', InventoryController::class);
    Route::resource('payments', PaymentController::class);
    Route::resource('enrollments', EnrollmentController::class);
});




Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
