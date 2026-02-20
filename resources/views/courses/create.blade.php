@extends('layouts.app')

@section('title', 'Create Course')

@section('content')
<h2 class="text-2xl font-bold mb-6">Create Course</h2>

@include('courses.partials._form', [
    'action' => route('courses.store'),
    'method' => 'POST',
    'buttonText' => 'Create Course'
])
@endsection