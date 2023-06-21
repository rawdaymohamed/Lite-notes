<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Notes') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a class="bg-indigo-500 hover:bg-indigo-600 text-white font-bold py-2 px-4 rounded"
                href="{{ route('notes.create') }}">+ New Note</a>
            @forelse ($notes as $note)
                <div class="my-8 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                    <h2 class="font-bold text-2xl">
                        <a href="{{ route('notes.show', $note->id) }}"> {{ $note->title }}</a>
                    </h2>
                    <p class="mt-2">
                        {{ Str::limit($note->text, 200, '...') }}
                    </p>
                    <span class="block mt-4 text-sm opacity-70">{{ $note->updated_at->diffForHumans() }}</span>
                </div>

            @empty
                <p>You have no notes yet</p>
            @endforelse
            <br>
            {{ $notes->links() }}
        </div>
    </div>
</x-app-layout>
