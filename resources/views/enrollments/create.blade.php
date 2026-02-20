@extends('layouts.app')

@section('title','New Enrollment')

@section('content')
<h2 class="text-2xl font-bold mb-6">New Enrollment</h2>

@include('enrollments.partials._form', [
    'action' => route('enrollments.store'),
    'method' => 'POST',
    'buttonText' => 'Create Enrollment',
    'students' => $students,
    'courses' => $courses
])
@endsection
