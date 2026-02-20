<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function enrollmentsExcel()
    {
        return Excel::download(new \App\Exports\EnrollmentsExport, 'enrollments.xlsx');
    }

    public function enrollmentsPDF()
    {
        $enrollments = Enrollment::with(['student','course'])->get();
        $pdf = Pdf::loadView('reports.enrollments', compact('enrollments'));
        return $pdf->download('enrollments.pdf');
    }
}
