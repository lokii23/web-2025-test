<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-black-800 dark:text-black-200 leading-tight">
            {{ __('Dashboard Admin') }}
        </h2>
    </x-slot>

    <div class="flex h-screen">
        <!-- Sidebar -->
        <nav class="w-64 bg-gray-800 text-white flex flex-col p-4">
            <h2 class="text-2xl font-bold mb-6">My App</h2>
    
            <a href="{{ route('admin/dashboard') }}" class="mb-2 p-2 rounded hover:bg-gray-700">Dashboard</a>
            <a href="{{ route('admin/products/create') }}" class="hover:bg-gray-700 p-2 rounded">Products</a>
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
        <div class="flex-1 p-6 bg-gray-100 overflow-y-auto">
            @yield('content')
        </div>
    </div>
    
    
</x-app-layout>
