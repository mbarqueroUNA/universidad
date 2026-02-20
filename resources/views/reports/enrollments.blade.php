<!DOCTYPE html>
<html>
<head>
    <title>Enrollments Report</title>
    <style>
        table { width:100%; border-collapse: collapse; }
        th, td { border:1px solid #000; padding:8px; text-align:left; }
        th { background-color:#f2f2f2; }
    </style>
</head>
<body>
    <h2>Enrollments Report</h2>
    <table>
        <thead>
            <tr>
                <th>Student</th>
                <th>Course</th>
                <th>Paid Amount</th>
                <th>Status</th>
                <th>Created At</th>
            </tr>
        </thead>
        <tbody>
            @foreach($enrollments as $enrollment)
            <tr>
                <td>{{ $enrollment->student->first_name }} {{ $enrollment->student->last_name }}</td>
                <td>{{ $enrollment->course->name }}</td>
                <td>{{ $enrollment->paid_amount }}</td>
                <td>{{ ucfirst($enrollment->status) }}</td>
                <td>{{ $enrollment->created_at->format('Y-m-d') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
