<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex">
                <p class="opacity-70 dark:text-white">
                    Created at: <strong>{{ $note->created_at->diffForHumans() }}</strong>
                </p>
                <p class="ml-5 opacity-70 dark:text-white">
                    Updated at: <strong>{{ $note->updated_at->diffForHumans() }}</strong>
                </p>
            </div>
            <div class="my-8 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                <h2 class="font-bold text-4xl">
                    {{ $note->title }}
                </h2>
                <p class="mt-2 whitespace-pre-wrap"> {{ $note->text }}</p>

            </div>


        </div>
    </div>
</x-app-layout>
