<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __(' New Notes') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <form method="post" action="{{ route('notes.store') }}">
                @csrf
                <input
                    class="my-2 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    type="text" name="title" placeholder="Title" value="{{ old('title') }}">
                @error('title')
                    <div class="text-red-600 text-sm">
                        {{ $message }}</div>
                @enderror
                <textarea name="text" rows="10"
                    class="my-2 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    placeholder="Start typing here..." value="{{ old('text') }}"></textarea>
                @error('text')
                    <div class="text-red-600 text-sm">
                        {{ $message }}</div>
                @enderror
                <button class="mt-5 bg-indigo-500 hover:bg-indigo-600 text-white font-bold py-2 px-4 rounded">Save
                    Note</button>
            </form>


        </div>
    </div>
</x-app-layout>
