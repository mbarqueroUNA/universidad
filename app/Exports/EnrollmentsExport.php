<?php

namespace App\Exports;

use App\Models\Enrollment;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class EnrollmentsExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Enrollment::with(['student','course'])->get()->map(function($enrollment){
            return [
                'Student' => $enrollment->student->first_name.' '.$enrollment->student->last_name,
                'Course' => $enrollment->course->name,
                'Paid Amount' => $enrollment->paid_amount,
                'Status' => ucfirst($enrollment->status),
                'Created At' => $enrollment->created_at->format('Y-m-d')
            ];
        });
    }

    public function headings(): array
    {
        return ['Student','Course','Paid Amount','Status','Created At'];
    }
}
