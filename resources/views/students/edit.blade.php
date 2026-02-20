@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Student</h1>

    <form action="{{ route('students.update', $student) }}" method="POST">
        @method('PUT')

        @include('students.partials.form', [
            'student' => $student,
            'buttonText' => 'Update Student'
        ])
    </form>
</div>
@endsection
