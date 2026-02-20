@extends('layouts.app')

@section('title','Edit Enrollment')

@section('content')
<h2 class="text-2xl font-bold mb-6">Edit Enrollment</h2>

@include('enrollments.partials._form', [
    'action' => route('enrollments.update', $enrollment),
    'method' => 'PUT',
    'buttonText' => 'Update Enrollment',
    'students' => $students,
    'courses' => $courses,
    'enrollment' => $enrollment
])
@endsection
