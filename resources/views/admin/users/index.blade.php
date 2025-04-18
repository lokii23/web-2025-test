<x-app-layout>

    <div class="flex h-screen" style="">
        <!-- Sidebar -->
        <nav class="w-64 bg-gray-800 text-white flex flex-col p-4">
            <h2 class="text-2xl font-bold mb-6">CCS WEB TEST SYSTEM</h2>
    
            <a href="{{ route('admin/dashboard') }}" class="mb-2 p-2 rounded hover:bg-gray-700" style="background-color: rgb(255,50,50);">Dashboard</a>
            <a href="{{ route('admin/create-question') }}" class="hover:bg-gray-700 p-2 rounded">Create Question</a>
            <a href="{{ route('admin.exam-attempts') }}" class="hover:bg-gray-700 p-2 rounded" >View Exam Attempt</a>
            <a href="{{ route('logout') }}"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
               class="mt-auto p-2 rounded hover:bg-gray-700">Logout</a>
    
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                @csrf
            </form>
        </nav>

        
        <div class="p-4 bg-white rounded shadow">
            <table cclass="table-auto w-full text-left border border-gray-300 rounded shadow">
            <h2 class="text-xl font-bold">Users 
                <a href="{{ route('admin/dashboard') }}" class="btn btn-outline-primary" style="position: relative; right: -1000px;">Back</a>
            </h2>
            <br />
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Name</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Email</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Password</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Role</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr class="border-b">
                            <td class="px-6 py-2">{{ $user->name }}</td>
                            <td class="px-6 py-2">{{ $user->email }}</td>
                            <td class="p-3 text-xs break-all">{{ $user->password }}</td>
                            <td class="px-6 py-2 capitalize">{{ $user->usertype }}</td>
                            <td class="px-6 py-2 flex gap-2">
                                <a href="{{ route('admin.users.edit', $user->id) }}"
                                   class="btn btn-warning text-white px-3 py-1 rounded hover:bg-yellow-500">
                                    Edit
                                </a>
    
                                <!-- Delete Button triggers modal -->
                                <button onclick="openModal({{ $user->id }})"
                                        class="btn btn-danger px-3 py-1 rounded hover:bg-red-600">
                                    Delete
                                </button>
    
                                <!-- Modal -->
                                <div id="modal-{{ $user->id }}" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
                                    <div class="bg-white p-6 rounded shadow-lg max-w-md w-full">
                                        <h2 class="text-lg font-semibold mb-4">Delete Confirmation</h2>
                                        <p class="mb-4">Are you sure you want to delete <strong>{{ $user->name }}</strong>?</p>
                                        <form method="POST" action="{{ route('admin.users.destroy', $user->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <div class="flex justify-end gap-2">
                                                <button type="button" onclick="closeModal({{ $user->id }})"
                                                        class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Cancel</button>
                                                <button type="submit"
                                                        class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">Delete</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
    
    <script>
        function openModal(id) {
            document.getElementById(`modal-${id}`).classList.remove('hidden');
            document.getElementById(`modal-${id}`).classList.add('flex');
        }

        function closeModal(id) {
            document.getElementById(`modal-${id}`).classList.add('hidden');
            document.getElementById(`modal-${id}`).classList.remove('flex');
        }
    </script>
</x-app-layout>
