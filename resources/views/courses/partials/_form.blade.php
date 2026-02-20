<form action="{{ $action }}" method="POST" class="bg-white p-6 rounded-2xl shadow space-y-4">
    @csrf
    @if($method === 'PUT')
        @method('PUT')
    @endif

    <div>
        <label class="block text-gray-700 font-medium mb-1">Name</label>
        <input type="text" name="name" value="{{ old('name', $course->name ?? '') }}" class="border rounded-xl px-4 py-2 w-full">
        @error('name') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-gray-700 font-medium mb-1">Code</label>
        <input type="text" name="code" value="{{ old('code', $course->code ?? '') }}" class="border rounded-xl px-4 py-2 w-full">
        @error('code') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-gray-700 font-medium mb-1">Description</label>
        <textarea name="description" class="border rounded-xl px-4 py-2 w-full">{{ old('description', $course->description ?? '') }}</textarea>
        @error('description') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div class="grid grid-cols-3 gap-4">
        <div>
            <label class="block text-gray-700 font-medium mb-1">Price</label>
            <input type="number" name="price" value="{{ old('price', $course->price ?? '') }}" step="0.01" class="border rounded-xl px-4 py-2 w-full">
            @error('price') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block text-gray-700 font-medium mb-1">Capacity</label>
            <input type="number" name="capacity" value="{{ old('capacity', $course->capacity ?? '') }}" class="border rounded-xl px-4 py-2 w-full">
            @error('capacity') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block text-gray-700 font-medium mb-1">Start Date</label>
            <input type="date" name="start_date" value="{{ old('start_date', isset($course) ? $course->start_date->format('Y-m-d') : '') }}" class="border rounded-xl px-4 py-2 w-full">
            @error('start_date') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block text-gray-700 font-medium mb-1">End Date</label>
            <input type="date" name="end_date" value="{{ old('end_date', isset($course) ? $course->end_date->format('Y-m-d') : '') }}" class="border rounded-xl px-4 py-2 w-full">
            @error('end_date') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
        </div>
    </div>

    <div>
        <button type="submit" class="bg-slate-900 text-white px-6 py-2 rounded-xl hover:bg-slate-800 transition shadow-sm">
            {{ $buttonText }}
        </button>
    </div>
</form>