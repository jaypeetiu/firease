<x-app-layout>
    <x-slot name="header">
        {{ __('Locations') }}
    </x-slot>
    @if(session()->has('success'))
    <div class="alert alert-success">
        <div class="flex items-center p-4 mb-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800" role="alert">
            <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
            </svg>
            <span class="sr-only">Info</span>
            <div>
                <span class="font-medium">{{ session()->get('success') }}</span>
            </div>
        </div>
    </div>
    @endif
    <div class="flex item-center grid grid-cols-4 gap-5 mt-4 m-2 p-2">
        <div class="col-span-3"></div>
        <div>
            @can('super_access')
            <div class="justify-self-center w-full">
                <select name="fire_type" id="fire_type" class="rounded w-full">
                    <option>
                        Select Station
                    </option>
                    <option value="Station1">
                        Station 1
                    </option>
                    <option value="Station2">
                        Station 2
                    </option>
                    <option value="Station3">
                        Station 3
                    </option>
                    <option value="Station4">
                        Station 4
                    </option>
                </select>
            </div>
            @endcan
        </div>
        <div class="col-span-3">
            <h1 class="font-semibold">
                @foreach($locations as $loc)
                {{ $loc->address }}
                @endforeach
            </h1>
        </div>
        <div class="justify-self-center">
            <button onclick="showModal()" class="p-2 pl-6 pr-6 bg-red-500 rounded text-white text-sm shadow-lg hover:shadow-red-500/50 hover:duration-700">ADD FIREFIGHTER</button>
        </div>
        <!-- Main modal -->
        <div id="defaultModal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative w-full max-w-2xl max-h-full">
                <form method="post" action="{{ route('station.user.store') }}" autocomplete="off">
                    @csrf
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow bg-gray-700 shadow-2xl">
                        <!-- Modal header -->
                        <div class="flex items-start justify-between p-4 border-b rounded-t border-gray-600">
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                Add Fire Fighter
                            </h3>
                            <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" onclick="closeModal()">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <div class="p-6 space-y-6">
                            <x-label for="name" :value="__('Name')" class="text-white" />
                            <x-input type="text" name="name" id="name" value="{{ old('name') }}" required autofocus placeholder='John Doe' />

                            <x-label for="email" :value="__('Email')" class="text-white" />
                            <x-input type="email" name="email" id="email" value="{{ old('email') }}" required autofocus placeholder='example@gmail.com' />

                            <x-label for="age" :value="__('Age')" class="text-white" />
                            <x-input type="number" name="age" id="age" value="{{ old('age') }}" required autofocus />
                        </div>
                        <!-- Modal footer -->
                        <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b border-gray-600">
                            <button type="submit" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Submit</button>
                            <button onclick="closeModal()" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-red-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancel</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="flex item-center grid grid-cols-4 gap-5 mt-4 m-2 p-2">
        <div class="col-span-3">
            <div class="shadow-md mt-4 relative mx-auto w-full overflow-hidden rounded-md bg-gray-100 p-2 sm:p-4 h-auto">
                <div id="map" class="h-96 w-full rounded"></div>
            </div>
        </div>
        <div>
            <div class="shadow-md mt-4 relative mx-auto max-w-2xl overflow-hidden rounded-md bg-gray-100 p-2 sm:p-4">
                <h5 class="font-bold">
                    FIREFIGHTER ON DUTY: {{$users->count()}}
                </h5>
                <ul role="list" class="divide-y divide-gray-100 overflow-y-scroll max-h-screen h-96">
                    @foreach($users as $user)
                    <li class="flex justify-between gap-x-6 py-5 shadow-md hover:shadow-2xl hover:duration-700 bg-gray-100 p-4 mt-4">
                        <div onclick="updateUser({{ $user->id }})" class="flex min-w-0 gap-x-4">
                            <img class="h-12 w-12 flex-none rounded-full ring-4 {{$user->status=='inactive'?'ring-red-500':'ring-blue-500'}} bg-gray-50" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                            <div class="min-w-0 flex-auto">
                                <p class="text-sm font-semibold leading-6 text-gray-900">Name: {{$user->name}}</p>
                                <p class="mt-1 truncate text-xs leading-5 text-gray-500">Age: {{$user->age}}</p>
                            </div>
                        </div>
                        <div onclick="deleteUser({{ $user->id }})" class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
                            <svg class="h-6 w-6 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7a4 4 0 11-8 0 4 4 0 018 0zM9 14a6 6 0 00-6 6v1h12v-1a6 6 0 00-6-6zM21 12h-6" />
                            </svg>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript">
        let map, infoWindow;
        <?php

        #Convert the PHP variable into Javascript variable
        /* The above code is printing a JavaScript variable declaration statement. It is creating a
        JavaScript array variable called "locations" and assigning it the value of the PHP variable
        "". If "" is empty or null, it will assign an empty array "[]". */
        printf('var locations=[%s];', $stations ?: '[]');

        ?>

        function initMap() {

            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 13,
                center: new google.maps.LatLng(8.4810899, 124.6498201),
                mapTypeId: google.maps.MapTypeId.ROADMAP
            });
            const trafficLayer = new google.maps.TrafficLayer();

            trafficLayer.setMap(map);

            var infowindow = new google.maps.InfoWindow();

            var marker, i;

            locations.map((datas, key) => {
                datas.map((value, k) => {
                    marker = new google.maps.Marker({
                        position: new google.maps.LatLng(value.lat, value.lang),
                        map: map,
                        icon: {
                            url: "https://maps.gstatic.com/mapfiles/ms2/micons/red-dot.png"
                        }
                    });

                    google.maps.event.addListener(marker, 'click', (function(marker, i) {
                        return function() {
                            infowindow.setContent(value.address);
                            infowindow.open(map, marker);
                        }
                    })(marker, i));
                })
            })
        }

        window.initMap = initMap;

        function showModal() {
            document.getElementById('defaultModal').style.display = 'block';
            document.getElementById('defaultModal').style.margin = 'auto';
            document.getElementById('defaultModal').style.width = '50%';
        }

        function closeModal() {
            document.getElementById('defaultModal').style.display = 'none';
        }

        function updateUser(userId) {
            $.ajax({
                type: 'POST',
                url: 'user-status/' + userId,
                data: {
                    _token: '{{ csrf_token() }}',
                    // Any additional data you want to send
                },
                success: function(data) {
                    // Handle the success response, if needed
                    window.location.reload();
                },
                error: function(xhr) {
                    // Handle the error response, if needed
                    console.log(xhr);
                }
            });
        }

        function deleteUser(userId) {
            let text = "Please Confirm to delete user!\nPress Ok or Cancel.";
            if (confirm(text) == true) {
                $.ajax({
                    type: 'DELETE',
                    url: 'user-remove/' + userId,
                    data: {
                        _token: '{{ csrf_token() }}',
                        // Any additional data you want to send
                    },
                    success: function(data) {
                        // Handle the success response, if needed
                        window.location.reload();
                    },
                    error: function(xhr) {
                        // Handle the error response, if needed
                        console.log(xhr);
                    }
                });
            }
        }
    </script>

    <script type="text/javascript" src="https://maps.google.com/maps/api/js?key={{ env('GOOGLE_MAP_KEY') }}&callback=initMap"></script>

</x-app-layout>