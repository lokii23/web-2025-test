<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-bold">Edit User</h2>
    </x-slot>

    <div class="p-4 bg-white rounded shadow max-w-xl mx-auto">
        <form method="POST" action="{{ route('admin.users.update', $user->id) }}">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block mb-1 font-semibold">Name</label>
                <input type="text" name="name" value="{{ $user->name }}" class="w-full border rounded p-2" />
            </div>

            <div class="mb-4">
                <label class="block mb-1 font-semibold">Email</label>
                <input type="email" name="email" value="{{ $user->email }}" class="w-full border rounded p-2" />
            </div>

            <div class="mb-4">
                <label class="block mb-1 font-semibold">Role</label>
                <select name="role" class="w-full border rounded p-2">
                    <option value="student" {{ $user->role === 'user' ? 'selected' : '' }}>Student</option>
                    <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                </select>
            </div>

            <div class="flex justify-end">
                <button type="submit" class="btn btn-success px-4 py-2 rounded hover:bg-blue-700">Update</button>
            </div>
        </form>
    </div>
</x-app-layout>
