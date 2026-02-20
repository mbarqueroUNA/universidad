<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>School ERP</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">

<div class="flex h-screen">

    <!-- SIDEBAR -->
    <aside class="w-72 bg-slate-900 text-slate-200 flex flex-col">

        <div class="p-6 text-2xl font-bold border-b border-slate-700">
            School ERP
        </div>

        

        <nav class="flex-1 p-4 space-y-1 text-sm">

            <a href="{{ route('dashboard') }}"
               class="flex items-center gap-3 px-4 py-3 rounded-lg
               {{ request()->routeIs('dashboard') ? 'bg-slate-800 text-white' : 'hover:bg-slate-800' }}">
                📊 Dashboard
            </a>

            <a href="{{ route('students.index') }}"
               class="flex items-center gap-3 px-4 py-3 rounded-lg
               {{ request()->routeIs('students.*') ? 'bg-slate-800 text-white' : 'hover:bg-slate-800' }}">
                🎓 Students
            </a>

            <a href="{{ route('courses.index') }}"
               class="flex items-center gap-3 px-4 py-3 rounded-lg
               {{ request()->routeIs('courses.*') ? 'bg-slate-800 text-white' : 'hover:bg-slate-800' }}">
                📚 Courses
            </a>
             <a href="{{ route('enrollments.index') }}"
               class="flex items-center gap-3 px-4 py-3 rounded-lg
               {{ request()->routeIs('enrollments.*') ? 'bg-slate-800 text-white' : 'hover:bg-slate-800' }}">
                📝 Enrollments
            </a>
            
            


    



        </nav>

        <div class="p-4 border-t border-slate-700">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="w-full text-left px-4 py-2 rounded-lg hover:bg-red-600 transition">
                    Logout
                </button>
            </form>
        </div>

    </aside>

    <!-- MAIN -->
    <div class="flex-1 flex flex-col">

        <!-- TOPBAR -->
        <header class="bg-white shadow-sm px-8 py-4 flex justify-between items-center">
            <h1 class="text-xl font-semibold text-gray-700">
                @yield('title', 'Dashboard')
            </h1>

            <div class="text-sm text-gray-500">
                {{ auth()->user()->name ?? 'User' }}
            </div>
        </header>

        <!-- CONTENT -->
        <main class="flex-1 p-8 overflow-y-auto">
            @yield('content')
        </main>

    </div>

</div>

</body>
</html>
