<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">Edit Exam Attempt</h2>
    </x-slot>

    <div class="max-w-xl mx-auto mt-10 bg-white p-6 shadow rounded">
        <form action="{{ route('exam-attempts.update', $attempt->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block font-bold">Subject</label>
                <input type="text" value="{{ $attempt->subject }}" disabled
                       class="w-full px-3 py-2 bg-gray-100 rounded">
            </div>

            <div class="mb-4">
                <label class="block font-bold">Score</label>
                <input type="number" name="score" value="{{ $attempt->score }}"
                       class="w-full px-3 py-2 border rounded">
            </div>

            <button type="submit" class="btn btn-primary text-white px-4 py-2 rounded">
                Update Score
            </button>
        </form>
    </div>
</x-app-layout>
