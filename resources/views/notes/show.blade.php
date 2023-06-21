<x-app-layout>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="flex justify-between">
                <div class="flex">
                    <p class="opacity-70 dark:text-white">
                        Created at: <strong>{{ $note->created_at->diffForHumans() }}</strong>
                    </p>
                    <p class="ml-3 opacity-70 dark:text-white">
                        Updated at: <strong>{{ $note->updated_at->diffForHumans() }}</strong>
                    </p>
                </div>
                <a class="px-4 py-2 font-bold text-white bg-indigo-500 rounded hover:bg-indigo-600"
                    href="{{ route('notes.edit', $note) }}">Edit Note</a>
            </div>
            <div class="p-6 my-8 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                <h2 class="text-4xl font-bold">
                    {{ $note->title }}
                </h2>
                <p class="mt-2 whitespace-pre-wrap"> {{ $note->text }}</p>

            </div>


        </div>
    </div>
</x-app-layout>
