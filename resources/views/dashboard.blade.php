@extends('layouts.app')

@section('title','Dashboard')

@section('content')
<h1 class="text-3xl font-bold mb-8">Dashboard</h1>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
    <div class="bg-white p-6 rounded-2xl shadow">
        <h2 class="text-gray-500 font-medium">Total Students</h2>
        <p class="text-3xl font-bold">{{ $totalStudents }}</p>
    </div>
    <div class="bg-white p-6 rounded-2xl shadow">
        <h2 class="text-gray-500 font-medium">Total Courses</h2>
        <p class="text-3xl font-bold">{{ $totalCourses }}</p>
    </div>
    <div class="bg-white p-6 rounded-2xl shadow">
        <h2 class="text-gray-500 font-medium">Total Enrollments</h2>
        <p class="text-3xl font-bold">{{ $totalEnrollments }}</p>
    </div>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
    <div class="bg-white p-6 rounded-2xl shadow">
        <h2 class="text-gray-500 font-medium mb-4">Enrollments Status</h2>
        <ul class="space-y-2">
            <li class="flex justify-between">
                <span>Paid</span>
                <span>{{ $paidEnrollments }}</span>
            </li>
            <li class="flex justify-between">
                <span>Pending</span>
                <span>{{ $pendingPayments }}</span>
            </li>
        </ul>
    </div>
    <div class="bg-white p-6 rounded-2xl shadow">
        <h2 class="text-gray-500 font-medium mb-4">Students per Course</h2>
        <ul class="space-y-2">
            @foreach($coursesWithStudents as $course)
                <li class="flex justify-between">
                    <span>{{ $course->name }}</span>
                    <span>{{ $course->enrollments_count }}</span>
                </li>
            @endforeach
        </ul>
    </div>
</div>

<div class="bg-white p-6 rounded-2xl shadow mt-6">
    <h2 class="text-gray-500 font-medium mb-4">Enrollments Status Chart</h2>
    <canvas id="enrollmentChart"></canvas>
</div>

<script>
    const ctx = document.getElementById('enrollmentChart').getContext('2d');
    const enrollmentChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['Paid','Pending','Cancelled'],
            datasets: [{
                label: 'Enrollments',
                data: [{{ $paidEnrollments }}, {{ $pendingPayments }}, {{ $totalEnrollments - $paidEnrollments - $pendingPayments }}],
                backgroundColor: ['#22c55e','#facc15','#ef4444']
            }]
        },
        options: { responsive:true }
    });
</script>

<div class="flex gap-4 mt-4">
    <a href="{{ route('reports.enrollments.excel') }}" class="bg-blue-600 text-white px-4 py-2 rounded-xl hover:bg-blue-700 transition">Export Excel</a>
    <a href="{{ route('reports.enrollments.pdf') }}" class="bg-red-600 text-white px-4 py-2 rounded-xl hover:bg-red-700 transition">Export PDF</a>
</div>

@endsection
