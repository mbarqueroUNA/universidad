@extends('layouts.app')

@section('title', 'Edit Course')

@section('content')
<h2 class="text-2xl font-bold mb-6">Edit Course</h2>

@include('courses.partials._form', [
    'action' => route('courses.update', $course),
    'method' => 'PUT',
    'buttonText' => 'Update Course',
    'course' => $course
])
@endsection
