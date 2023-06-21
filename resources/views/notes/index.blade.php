<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ request()->routeIs('notes.index') ? __('Notes') : __('Trash') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="relative px-4 py-3 mb-2 text-green-700 bg-green-100 border border-green-400 rounded"
                    role="alert">
                    <strong class="font-bold">Success!</strong>

                    <span class="block sm:inline">{{ session('success') }}</span>

                </div>
            @endif
            @if (request()->routeIs('notes.index'))
                <a class="px-4 py-2 font-bold text-white bg-indigo-500 rounded hover:bg-indigo-600"
                    href="{{ route('notes.create') }}">+ New Note</a>
            @endif
            @forelse ($notes as $note)
                <div class="p-6 my-8 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                    <h2 class="text-2xl font-bold">
                        <a href="{{ route('notes.show', $note) }}"> {{ $note->title }}</a>
                    </h2>
                    <p class="mt-2">
                        {{ Str::limit($note->text, 200, '...') }}
                    </p>
                    <span class="block mt-4 text-sm opacity-70">{{ $note->updated_at->diffForHumans() }}</span>
                </div>

            @empty

                <p class="my-3 dark:text-white">
                    @if (request()->routeIs('notes.index'))
                        You have no notes yet.
                </p>
            @else
                You don't have items in the trash.
            @endif
            @endforelse
            <br>
            {{ $notes->links() }}
        </div>
    </div>
</x-app-layout>
