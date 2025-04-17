<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-black-800 dark:text-black-200 leading-tight">
            {{ __('Your Score') }}
        </h2>
    </x-slot>

    <div style="background-color: #726f6fbb;" class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-white-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-black-900 dark:text-black-100">
                    <h1 class="text-3xl font-bold text-green-600">Your Score: {{ $score }} / 30</h1>
                    <br />
                    <a href="dashboard" style="background-color: #ff7b00;" class="mt-4 inline-block  text-white px-2 py-2 rounded">Back to Home</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
