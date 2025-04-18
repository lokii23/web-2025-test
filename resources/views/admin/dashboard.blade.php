<x-app-layout>

    <div class="flex h-screen">
        <!-- Sidebar -->
        <nav class="w-64 bg-gray-800 text-white flex flex-col p-4">
            <h2 class="text-2xl font-bold mb-6">CCS WEB TEST SYSTEM</h2>
    
            <a href="{{ route('admin/dashboard') }}" class="mb-2 p-2 rounded hover:bg-gray-700" style="background-color: rgb(255,50,50);">Dashboard</a>
            <a href="{{ route('admin/create-question') }}" class="hover:bg-gray-700 p-2 rounded">Create Question</a>
            <a href="{{ route('admin.exam-attempts') }}" class="hover:bg-gray-700 p-2 rounded">View Exam Attempt</a>
            <a href="{{ route('logout') }}"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
               class="mt-auto p-2 rounded hover:bg-gray-700">Logout</a>
    
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                @csrf
            </form>
        </nav>
    
        <!-- Main Content -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4" style="padding: 50px;">
            {{-- All Users --}}
            <a href="{{ route('admin.users') }}" class="p-4 bg-white rounded-xl shadow hover:shadow-lg transition flex items-center gap-4">
                <i data-lucide="users" class="w-8 h-8 text-blue-500"></i>
                <div>
                    <h3 class="text-lg font-bold">Total Users</h3>
                    <p>{{ $totalUsers }}</p>
                </div>
            </a>

            {{-- Admins --}}
            <a href="{{ route('admin.users.admins') }}" class="p-4 bg-blue-100 rounded-xl shadow hover:shadow-lg transition flex items-center gap-4">
                <i data-lucide="shield-check" class="w-8 h-8 text-blue-700"></i>
                <div>
                    <h3 class="text-lg font-bold">Admins</h3>
                    <p>{{ $totalAdmins }}</p>
                </div>
            </a>

            {{-- Students --}}
            <a href="{{ route('admin.users.students') }}" class="p-4 bg-green-100 rounded-xl shadow hover:shadow-lg transition flex items-center gap-4">
                <i data-lucide="graduation-cap" class="w-8 h-8 text-green-700"></i>
                <div>
                    <h3 class="text-lg font-bold">Students</h3>
                    <p>{{ $totalStudents }}</p>
                </div>
            </a>

        
            </div>
        </div>

    </div>
    
    
</x-app-layout>
