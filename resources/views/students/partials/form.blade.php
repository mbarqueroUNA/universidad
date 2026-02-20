@csrf

@if($errors->any())
    <div class="bg-red-100 text-red-700 p-4 rounded-xl mb-6">
        <ul class="list-disc pl-6">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="bg-white p-8 rounded-2xl shadow-sm space-y-6">

    <div class="grid grid-cols-2 gap-6">

        <div>
            <label class="block text-sm text-gray-600 mb-2">First Name</label>
            <input type="text" name="first_name"
                   value="{{ old('first_name', $student->first_name ?? '') }}"
                   class="w-full border rounded-xl px-4 py-2 focus:ring-2 focus:ring-slate-500 outline-none">
        </div>

        <div>
            <label class="block text-sm text-gray-600 mb-2">Last Name</label>
            <input type="text" name="last_name"
                   value="{{ old('last_name', $student->last_name ?? '') }}"
                   class="w-full border rounded-xl px-4 py-2 focus:ring-2 focus:ring-slate-500 outline-none">
        </div>

        <div>
            <label class="block text-sm text-gray-600 mb-2">Email</label>
            <input type="email" name="email"
                   value="{{ old('email', $student->email ?? '') }}"
                   class="w-full border rounded-xl px-4 py-2 focus:ring-2 focus:ring-slate-500 outline-none">
        </div>

        <div>
            <label class="block text-sm text-gray-600 mb-2">Phone</label>
            <input type="text" name="phone"
                   value="{{ old('phone', $student->phone ?? '') }}"
                   class="w-full border rounded-xl px-4 py-2 focus:ring-2 focus:ring-slate-500 outline-none">
        </div>

    </div>

    <button class="bg-slate-900 text-white px-6 py-3 rounded-xl hover:bg-slate-800 transition">
        {{ $buttonText }}
    </button>

</div>
