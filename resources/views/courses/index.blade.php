@extends('layouts.app')

@section('title', 'Courses')

@section('content')

<div class="flex justify-between items-center mb-6">
    <h2 class="text-2xl font-bold text-slate-800">Courses</h2>
    <a href="{{ route('courses.create') }}" class="bg-slate-900 text-white px-5 py-2.5 rounded-xl hover:bg-slate-800 transition shadow-sm">
        + New Course
    </a>
</div>

<form method="GET" class="mb-6">
    <input type="text" name="search" value="{{ request('search') }}" placeholder="Search courses..." class="border rounded-xl px-4 py-2 w-80">
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
                <th class="px-6 py-4 text-left">Name</th>
                <th class="px-6 py-4 text-left">Code</th>
                <th class="px-6 py-4 text-left">Capacity</th>
                <th class="px-6 py-4 text-left">Price</th>
                <th class="px-6 py-4 text-left">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
            @forelse($courses as $course)
            <tr class="hover:bg-gray-50 transition">
                <td class="px-6 py-4 font-medium text-slate-700">{{ $course->name }}</td>
                <td class="px-6 py-4 text-gray-600">{{ $course->code }}</td>
                <td class="px-6 py-4 text-gray-600">{{ $course->capacity }}</td>
                <td class="px-6 py-4 text-gray-600">${{ number_format($course->price,2) }}</td>
                <td class="px-6 py-4 flex gap-4">
                    <a href="{{ route('courses.edit', $course) }}" class="text-blue-600 hover:text-blue-800">Edit</a>
                    <form action="{{ route('courses.destroy', $course) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="text-red-600 hover:text-red-800" onclick="return confirm('Delete course?')">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="px-6 py-6 text-center text-gray-400">No courses found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="mt-6">
    {{ $courses->links() }}
</div>

@endsection
