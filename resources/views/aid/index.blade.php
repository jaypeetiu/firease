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
    <div class="grid grid-cols-8 gap-4">
        <div class="col-span-6">
            <!-- Breaking News Section -->
            <div class="bg-white p-4 rounded shadow">
                <h2 class="text-2xl font-bold mb-4">FIRST AID TIPS</h2>
                <div class="mb-4">
                    <div class="flex items-center">
                        <!-- Image -->
                        <img src="{{ asset('assets/aid1.png') }}" alt="Image" class="w-16 h-16 mr-4 bg-black">
                        <div class="flex-row">
                            <!-- H2 Header -->
                            <h3 class="text-xl font-bold">BURNS</h3>
                            <p>First Aid for Minor Burns</p>
                        </div>
                    </div>
                    <!-- Button to edit news -->
                    <!-- <button class="bg-blue-500 text-white px-4 py-2 rounded mt-2">Edit News</button> -->
                </div>
                <div class="mb-4">
                    <div class="flex items-center">
                        <!-- Image -->
                        <img src="{{ asset('assets/aid2.png') }}" alt="Image" class="w-16 h-16 mr-4 bg-black">
                        <div class="flex-row">
                            <!-- H2 Header -->
                            <h3 class="text-xl font-bold">CUTS AND SCRAPES</h3>
                            <p>First Aid for Cuts and Scrapes</p>
                        </div>
                    </div>
                    <!-- Button to edit news -->
                    <!-- <button class="bg-blue-500 text-white px-4 py-2 rounded mt-2">Edit News</button> -->
                </div>
                <div class="mb-4">
                    <div class="flex items-center">
                        <!-- Image -->
                        <img src="{{ asset('assets/aid3.png') }}" alt="Image" class="w-16 h-16 mr-4 bg-black">
                        <div class="flex-row">
                            <!-- H2 Header -->
                            <h3 class="text-xl font-bold">NOSEBLEEDS</h3>
                            <p>First Aid for Nosebleeds</p>
                        </div>
                    </div>
                    <!-- Button to edit news -->
                    <!-- <button class="bg-blue-500 text-white px-4 py-2 rounded mt-2">Edit News</button> -->
                </div>
                <div class="mb-4">
                    <div class="flex items-center">
                        <!-- Image -->
                        <img src="{{ asset('assets/aid4.png') }}" alt="Image" class="w-16 h-16 mr-4 bg-black">
                        <div class="flex-row">
                            <!-- H2 Header -->
                            <h3 class="text-xl font-bold">BITES</h3>
                            <p>First Aid for Animal Bites</p>
                        </div>
                    </div>
                    <!-- Button to edit news -->
                    <!-- <button class="bg-blue-500 text-white px-4 py-2 rounded mt-2">Edit News</button> -->
                </div>
                <div class="mb-4">
                    <div class="flex items-center">
                        <!-- Image -->
                        <img src="{{ asset('assets/aid5.png') }}" alt="Image" class="w-16 h-16 mr-4 bg-black">
                        <div class="flex-row">
                            <!-- H2 Header -->
                            <h3 class="text-xl font-bold">STINGS</h3>
                            <p>First Aid for Insects Stings</p>
                        </div>
                    </div>
                    <!-- Button to edit news -->
                    <!-- <button class="bg-blue-500 text-white px-4 py-2 rounded mt-2">Edit News</button> -->
                </div>
                <div class="mb-4">
                    <div class="flex items-center">
                        <!-- Image -->
                        <img src="{{ asset('assets/flame.png') }}" alt="Image" class="w-16 h-16 mr-4 bg-black">
                        <div class="flex-row">
                            <!-- H2 Header -->
                            <h3 class="text-xl font-bold">SPRAINS AND STRAINS</h3>
                            <p>First Aid for Sprains ans Strains</p>
                        </div>
                    </div>
                    <!-- Button to edit news -->
                    <!-- <button class="bg-blue-500 text-white px-4 py-2 rounded mt-2">Edit News</button> -->
                </div>
            </div>
        </div>

        <div class="col-span-2">
            <!-- Latest News Section -->
            <div class="bg-white p-4 rounded shadow">
                <h2 class="text-2xl font-bold mb-4">Latest News</h2>
                <ul class="overflow-y-scroll max-h-screen h-96">
                    @foreach($news as $new)
                    <li class="mb-2">
                        <img src="{{$new->image}}" alt="Image" class="w-48 h-36 mb-2 mt-4 rounded">
                        <h4 class="text-lg font-semibold">{{ $new->title }}</h4>
                        <p>{{ $new->description }}</p>
                        <!-- Button to edit news -->
                        @can('super_access')
                        <button class="bg-red-500 text-white px-4 py-2 rounded mt-2">Edit News</button>
                        @endcan
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    
</x-app-layout>