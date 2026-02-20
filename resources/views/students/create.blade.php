@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create Student</h1>

    <form action="{{ route('students.store') }}" method="POST">
        @include('students.partials.form', [
            'buttonText' => 'Create Student'
        ])
    </form>
</div>
@endsection
