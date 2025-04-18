<x-app-layout>

    <div class="flex h-screen">
        <!-- Sidebar -->
        <nav class="w-64 bg-gray-800 text-white flex flex-col p-4">
            <h2 class="text-2xl font-bold mb-6">CCS WEB TEST SYSTEM</h2>
    
            <a href="{{ route('admin/dashboard') }}" class="mb-2 p-2 rounded hover:bg-gray-700">Dashboard</a>
            <a href="{{ route('admin/create-question') }}" class="hover:bg-gray-700 p-2 rounded" style="background-color: rgb(255,50,50);">Create Question</a>
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
            <div style="background-color: #726f6fbb;" class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white dark:bg-white-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-black-900 dark:text-black-100">
                            <form action="{{ route('admin.questions.store') }}" method="POST">
                                @csrf
                    
                                <div class="mb-4">
                                    <label class="block text-sm font-medium text-gray-700">Subject</label>
                                    <input type="text" name="subject" class="w-full border rounded p-2" placeholder="e.g. elective2" required>
                                </div>
                    
                                <div class="mb-4">
                                    <label class="block text-sm font-medium text-gray-700">Question</label>
                                    <textarea name="question_text" class="w-full border rounded p-2" required></textarea>
                                </div>
                    
                                <div class="mb-4">
                                    <label class="block text-sm font-medium text-gray-700">Choices</label>
                                    @for ($i = 0; $i < 4; $i++)
                                        <div class="flex items-center mb-2">
                                            <input type="radio" name="correct_choice" value="{{ $i }}" class="mr-2" required>
                                            <input type="text" name="choices[]" class="w-full border rounded p-2" placeholder="Choice {{ $i + 1 }}" required>
                                        </div>
                                    @endfor
                                </div>
                    
                                <button class="bg-blue-500 text-black px-4 py-2 rounded" type="submit">Save Question</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
</x-app-layout>
