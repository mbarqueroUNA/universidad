@extends('layouts.app')

@section('title', 'Students')

@section('content')

<form method="GET" class="mb-6">
    <input type="text"
           name="search"
           value="{{ request('search') }}"
           placeholder="Search students..."
           class="border rounded-xl px-4 py-2 w-80">

    <button class="bg-slate-900 text-white px-4 py-2 rounded-xl">
        Search
    </button>
</form>

<div class="flex justify-between items-center mb-6">
    <div>
        <h2 class="text-2xl font-bold text-slate-800">Students</h2>
        <p class="text-gray-500 text-sm">Manage all registered students</p>
    </div>

    <a href="{{ route('students.create') }}"
       class="bg-slate-900 text-white px-5 py-2.5 rounded-xl hover:bg-slate-800 transition shadow-sm">
        + New Student
    </a>
</div>

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
                <th class="px-6 py-4 text-left">Email</th>
                <th class="px-6 py-4 text-left">Phone</th>
                <th class="px-6 py-4 text-left">Actions</th>
            </tr>
        </thead>

        <tbody class="divide-y divide-gray-100">

        @forelse($students as $student)
            <tr class="hover:bg-gray-50 transition">
                <td class="px-6 py-4 font-medium text-slate-700">
                    {{ $student->first_name }} {{ $student->last_name }}
                </td>
                <td class="px-6 py-4 text-gray-600">
                    {{ $student->email }}
                </td>
                <td class="px-6 py-4 text-gray-600">
                    {{ $student->phone }}
                </td>
                <td class="px-6 py-4 flex gap-4">
                    <a href="{{ route('students.edit', $student) }}"
                       class="text-blue-600 hover:text-blue-800">
                        Edit
                    </a>

                    <form action="{{ route('students.destroy', $student) }}"
                          method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="text-red-600 hover:text-red-800"
                                onclick="return confirm('Delete student?')">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4" class="px-6 py-6 text-center text-gray-400">
                    No students found.
                </td>
            </tr>
        @endforelse

        </tbody>
    </table>

</div>

<div class="mt-6">
    {{ $students->links() }}
</div>

@endsection
