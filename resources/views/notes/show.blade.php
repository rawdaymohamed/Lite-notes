<x-app-layout>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="relative px-4 py-3 mb-2 text-green-700 bg-green-100 border border-green-400 rounded"
                    role="alert">
                    <strong class="font-bold">Success!</strong>

                    <span class="block sm:inline">{{ session('success') }}</span>

                </div>
            @endif
            <div class="flex justify-between">
                <div class="flex">
                    <p class="opacity-70 dark:text-white">
                        Created at: <strong>{{ $note->created_at->diffForHumans() }}</strong>
                    </p>
                    <p class="ml-3 opacity-70 dark:text-white">
                        Updated at: <strong>{{ $note->updated_at->diffForHumans() }}</strong>
                    </p>
                </div>
                <div class="flex">
                    <a class="px-4 py-2 font-bold text-white bg-indigo-500 rounded hover:bg-indigo-600"
                        href="{{ route('notes.edit', $note) }}">Edit Note</a>
                    <form action="{{ route('notes.destroy', $note) }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" onclick="return confirm('Are you sure you want to delete this note?')"
                            class="px-4 py-2 ml-2 font-bold text-white bg-red-500 rounded hover:bg-red-600">
                            Move to trash</button>
                    </form>
                </div>
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
