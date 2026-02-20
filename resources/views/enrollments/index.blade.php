@extends('layouts.app')

@section('title','Enrollments')

@section('content')

<div class="flex justify-between items-center mb-6">
    <h2 class="text-2xl font-bold">Enrollments</h2>
    <a href="{{ route('enrollments.create') }}" class="bg-slate-900 text-white px-5 py-2.5 rounded-xl hover:bg-slate-800 transition shadow-sm">
        + New Enrollment
    </a>
</div>

<form method="GET" class="mb-6">
    <input type="text" name="search" value="{{ request('search') }}" placeholder="Search..." class="border rounded-xl px-4 py-2 w-80">
    <button class="bg-slate-900 text-white px-4 py-2 rounded-xl">Search</button>
</form>

@if(session('success'))
<div class="bg-green-100 text-green-700 p-4 rounded-xl mb-6">
    {{ session('success') }}
</div>
@endif

<div class="bg-white rounded-2xl shadow-sm overflow-hidden">
    <table class="min-w-full text-sm">
        <thead class="bg-gray-50 text-gray-600 uppercase text-xs">
            <tr>
                <th class="px-6 py-4">Student</th>
                <th class="px-6 py-4">Course</th>
                <th class="px-6 py-4">Paid Amount</th>
                <th class="px-6 py-4">Status</th>
                <th class="px-6 py-4">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
            @forelse($enrollments as $enrollment)
            <tr class="hover:bg-gray-50 transition">
                <td class="px-6 py-4">{{ $enrollment->student->first_name }} {{ $enrollment->student->last_name }}</td>
                <td class="px-6 py-4">{{ $enrollment->course->name }}</td>
                <td class="px-6 py-4">${{ number_format($enrollment->paid_amount,2) }}</td>
                <td class="px-6 py-4">{{ ucfirst($enrollment->status) }}</td>
                <td class="px-6 py-4 flex gap-4">
                    <a href="{{ route('enrollments.edit',$enrollment) }}" class="text-blue-600 hover:text-blue-800">Edit</a>
                    <form action="{{ route('enrollments.destroy',$enrollment) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="text-red-600 hover:text-red-800" onclick="return confirm('Delete enrollment?')">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="px-6 py-6 text-center text-gray-400">No enrollments found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="mt-6">
    {{ $enrollments->links() }}
</div>

@endsection
