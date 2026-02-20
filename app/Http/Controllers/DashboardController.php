<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Course;
use App\Models\Enrollment;

class DashboardController extends Controller
{
    public function index()
    {
        $totalStudents = Student::count();
        $totalCourses = Course::count();
        $totalEnrollments = Enrollment::count();
        $pendingPayments = Enrollment::where('status', 'pending')->count();
        $paidEnrollments = Enrollment::where('status', 'paid')->count();

        // Cursos con número de estudiantes matriculados
        $coursesWithStudents = Course::withCount('enrollments')->get();

        return view('dashboard', compact(
            'totalStudents',
            'totalCourses',       // <-- esta línea es importante
            'totalEnrollments',
            'pendingPayments',
            'paidEnrollments',
            'coursesWithStudents'
        ));
    }
}
