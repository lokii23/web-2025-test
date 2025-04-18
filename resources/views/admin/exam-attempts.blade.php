<x-app-layout>

    <div class="flex h-screen">
        <!-- Sidebar -->
        <nav class="w-64 bg-gray-800 text-white flex flex-col p-4">
            <h2 class="text-2xl font-bold mb-6">CCS WEB TEST SYSTEM</h2>
    
            <a href="{{ route('admin/dashboard') }}" class="mb-2 p-2 rounded hover:bg-gray-700">Dashboard</a>
            <a href="{{ route('admin/create-question') }}" class="hover:bg-gray-700 p-2 rounded">Create Question</a>
            <a href="{{ route('admin.exam-attempts') }}" class="hover:bg-gray-700 p-2 rounded" style="background-color: rgb(255,50,50);">View Exam Attempt</a>
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
            <div class="flex-1 p-6 bg-gray-100 overflow-y-auto">
                <div class="py-10">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        {{-- Filter --}}
                        <form method="GET" action="{{ route('admin.exam-attempts') }}" class="mb-6">
                            <div class="flex items-center space-x-4">
                                <label for="subject" class="font-medium text-gray-700">Filter by Subject:</label>
                                <select name="subject" id="subject" onchange="this.form.submit()" class="px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                    <option value="">All Subjects</option>
                                    @foreach ($subjects as $subj)
                                        <option value="{{ $subj }}" {{ request('subject') == $subj ? 'selected' : '' }}>
                                            {{ ucfirst($subj) }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </form>
            
                        {{-- Table --}}
                        <table class="table-auto w-full text-left border border-gray-300 rounded shadow">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="px-4 py-2">User</th>
                                    <th class="px-4 py-2">Subject</th>
                                    <th class="px-4 py-2">Score</th>
                                    <th class="px-4 py-2">Date</th>
                                    <th class="px-4 py-2">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($attempts as $attempt)
                                    <tr class="border-t">
                                        <td class="px-4 py-2">{{ $attempt->user->name ?? 'Unknown' }}</td>
                                        <td class="px-4 py-2">{{ $attempt->subject }}</td>
                                        <td class="px-4 py-2">{{ $attempt->score }}</td>
                                        <td class="px-4 py-2">{{ $attempt->created_at->format('m-d-Y H:i') }}</td>
                                        <td class="px-4 py-2 flex gap-2">
                                            <a href="{{ route('exam-attempts.edit', $attempt->id) }}"
                                               class="btn btn-warning text-black px-3 py-1 rounded">
                                                Edit
                                            </a>
                        
                                            <form action="{{ route('exam-attempts.destroy', $attempt->id) }}" method="POST"
                                                  onsubmit="return confirm('Are you sure you want to delete this attempt?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" 
                                                        class="btn btn-danger text-white px-3 py-1 rounded">
                                                    Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</x-app-layout>
