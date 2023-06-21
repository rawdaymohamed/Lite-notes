<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __(' New Notes') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">

            <form method="post" action="{{ route('notes.store') }}">
                @csrf
                <input
                    class="w-full px-3 py-2 my-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                    type="text" name="title" placeholder="Title" value="{{ old('title') }}">
                @error('title')
                    <div class="text-sm text-red-600">
                        {{ $message }}</div>
                @enderror
                <textarea name="text" rows="10"
                    class="w-full px-3 py-2 my-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                    placeholder="Start typing here..." value="{{ old('text') }}"></textarea>
                @error('text')
                    <div class="text-sm text-red-600">
                        {{ $message }}</div>
                @enderror
                <button class="px-4 py-2 mt-5 font-bold text-white bg-indigo-500 rounded hover:bg-indigo-600">Save
                    Note</button>
            </form>


        </div>
    </div>
</x-app-layout>
