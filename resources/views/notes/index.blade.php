<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Notes') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <a class="px-4 py-2 font-bold text-white bg-indigo-500 rounded hover:bg-indigo-600"
                href="{{ route('notes.create') }}">+ New Note</a>
            @forelse ($notes as $note)
                <div class="p-6 my-8 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                    <h2 class="text-2xl font-bold">
                        <a href="{{ route('notes.show', $note->id) }}"> {{ $note->title }}</a>
                    </h2>
                    <p class="mt-2">
                        {{ Str::limit($note->text, 200, '...') }}
                    </p>
                    <span class="block mt-4 text-sm opacity-70">{{ $note->updated_at->diffForHumans() }}</span>
                </div>

            @empty
                <p class="my-3 dark:text-white">You have no notes yet</p>
            @endforelse
            <br>
            {{ $notes->links() }}
        </div>
    </div>
</x-app-layout>
