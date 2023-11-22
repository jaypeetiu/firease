<x-app-layout>
    <x-slot name="header">
        {{ __('News') }}
    </x-slot>
    @if(session()->has('success'))
    <div class="alert alert-success">
        <div class="flex items-center p-4 mb-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800"
            role="alert">
            <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                fill="currentColor" viewBox="0 0 20 20">
                <path
                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
            </svg>
            <span class="sr-only">Info</span>
            <div>
                <span class="font-medium">{{ session()->get('success') }}</span>
            </div>
        </div>
    </div>
    @endif
    <div class="max-w-2xl mx-auto bg-white p-6 rounded-md shadow">
        <h2 class="text-2xl font-bold mb-4">Breaking News</h2>

        <!-- Form for creating news -->
        <form action="{{ route('news.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-600">Title</label>
                <input type="text" name="title" id="title" class="mt-1 p-2 w-full border rounded-md">
            </div>

            <div class="mb-4">
                <label for="image" class="block text-sm font-medium text-gray-600">Image URL</label>
                <input type="text" name="image" id="image" class="mt-1 p-2 w-full border rounded-md">
            </div>

            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-600">Description</label>
                <textarea name="description" id="description" rows="4" class="mt-1 p-2 w-full border rounded-md"></textarea>
            </div>

            <div class="mb-4">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Publish</button>
            </div>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</x-app-layout>