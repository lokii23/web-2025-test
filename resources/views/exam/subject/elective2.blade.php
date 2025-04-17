<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold">Exam: {{ ucfirst($subject) }}</h2>
    </x-slot>

    <div style="background-color: #726f6fbb;" class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-white-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-black-900 dark:text-black-100">
                    <form action="{{ route('exam.submit', $subject) }}" method="POST" class="max-w-4xl mx-auto p-6 bg-white shadow rounded">
                        @csrf
                        @foreach ($questions as $question)
                            <div class="mb-6">
                                <p class="font-medium">{{ $loop->iteration }}. {{ $question->question_text }}</p>
                                @foreach ($question->choices as $choice)
                                    <label class="block">
                                        <input type="radio" name="answers[{{ $question->id }}]" value="{{ $choice->id }}" required>
                                        {{ $choice->choice_text }}
                                    </label>
                                @endforeach
                            </div>
                        @endforeach
                
                        <button class="bg-green-500 text-black px-4 py-2 rounded">Submit Exam</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
