<form action="{{ $action }}" method="POST" class="bg-white p-6 rounded-2xl shadow space-y-4">
    @csrf
    @if($method === 'PUT')
        @method('PUT')
    @endif

    <div>
        <label class="block text-gray-700 font-medium mb-1">Student</label>
        <select name="student_id" class="border rounded-xl px-4 py-2 w-full">
            <option value="">-- Select Student --</option>
            @foreach($students as $student)
                <option value="{{ $student->id }}" {{ (old('student_id', $enrollment->student_id ?? '') == $student->id) ? 'selected' : '' }}>
                    {{ $student->first_name }} {{ $student->last_name }}
                </option>
            @endforeach
        </select>
        @error('student_id') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-gray-700 font-medium mb-1">Course</label>
        <select name="course_id" class="border rounded-xl px-4 py-2 w-full">
            <option value="">-- Select Course --</option>
            @foreach($courses as $course)
                <option value="{{ $course->id }}" {{ (old('course_id', $enrollment->course_id ?? '') == $course->id) ? 'selected' : '' }}>
                    {{ $course->name }}
                </option>
            @endforeach
        </select>
        @error('course_id') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div class="grid grid-cols-2 gap-4">
        <div>
            <label class="block text-gray-700 font-medium mb-1">Paid Amount</label>
            <input type="number" name="paid_amount" step="0.01" value="{{ old('paid_amount', $enrollment->paid_amount ?? '') }}" class="border rounded-xl px-4 py-2 w-full">
            @error('paid_amount') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block text-gray-700 font-medium mb-1">Status</label>
            <select name="status" class="border rounded-xl px-4 py-2 w-full">
                @foreach(['pending','paid','cancelled'] as $status)
                    <option value="{{ $status }}" {{ (old('status', $enrollment->status ?? '') == $status) ? 'selected' : '' }}>
                        {{ ucfirst($status) }}
                    </option>
                @endforeach
            </select>
            @error('status') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
        </div>
    </div>

    <div>
        <button type="submit" class="bg-slate-900 text-white px-6 py-2 rounded-xl hover:bg-slate-800 transition shadow-sm">
            {{ $buttonText }}
        </button>
    </div>
</form>
