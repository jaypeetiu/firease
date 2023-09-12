<x-app-layout>
    <x-slot name="header">
        {{ __('Locations') }}
    </x-slot>
    <!-- <select name="type_of_fire" id="type_of_fire" class="rounded" onchange="console.log(document.getElementById('type_of_fire').value)">
        <option value="test">
            Select Station
        </option>
        <option value="1">
            Cogon Station 1
        </option>
        <option value="2">
            Nazareth Station 1
        </option>
        <option value="3">
            Macasandig Station 1
        </option>
        <option value="4">
            Ketkai Station 1
        </option>
    </select> -->
    <div class="flex item-center grid grid-cols-4 gap-5 mt-4 m-2 p-2">
        <div class="col-span-3">
            <h1 class="font-semibold">
                @foreach($locations as $loc)
                {{ $loc->name }}
                @endforeach
            </h1>
        </div>
        <div class="justify-self-center">
            <button class="p-2 pl-6 pr-6 bg-red-500 rounded text-white text-sm shadow-lg hover:shadow-red-500/50 hover:duration-700">ADD FIREFIGHTER</button>
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
                    FIREFIGHTER ON DUTY: 5
                </h5>
                <ul role="list" class="divide-y divide-gray-100 overflow-y-scroll max-h-screen h-96">
                    <li class="flex justify-between gap-x-6 py-5 shadow-md hover:shadow-2xl hover:duration-700 bg-gray-100 p-4 mt-4">
                        <div class="flex min-w-0 gap-x-4">
                            <img class="h-12 w-12 flex-none rounded-full ring-4 ring-red-500 bg-gray-50" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                            <div class="min-w-0 flex-auto">
                                <p class="text-sm font-semibold leading-6 text-gray-900">Name: Leslie Alexander</p>
                                <p class="mt-1 truncate text-xs leading-5 text-gray-500">Age: 25</p>
                            </div>
                        </div>
                    </li>
                    <li class="flex justify-between gap-x-6 py-5 shadow-md hover:shadow-2xl hover:duration-700 bg-gray-100 p-4 mt-4">
                        <div class="flex min-w-0 gap-x-4">
                            <img class="h-12 w-12 flex-none rounded-full ring-4 ring-red-500 bg-gray-50" src="https://images.unsplash.com/photo-1519244703995-f4e0f30006d5?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                            <div class="min-w-0 flex-auto">
                                <p class="text-sm font-semibold leading-6 text-gray-900">Name: Michael Foster</p>
                                <p class="mt-1 truncate text-xs leading-5 text-gray-500">Age: 30</p>
                            </div>
                        </div>
                    </li>
                    <li class="flex justify-between gap-x-6 py-5 shadow-md hover:shadow-2xl hover:duration-700 bg-gray-100 p-4 mt-4">
                        <div class="flex min-w-0 gap-x-4">
                            <img class="h-12 w-12 flex-none rounded-full ring-4 ring-red-500 bg-gray-50" src="https://images.unsplash.com/photo-1519244703995-f4e0f30006d5?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                            <div class="min-w-0 flex-auto">
                                <p class="text-sm font-semibold leading-6 text-gray-900">Name: Michael Foster</p>
                                <p class="mt-1 truncate text-xs leading-5 text-gray-500">Age: 30</p>
                            </div>
                        </div>
                    </li>
                    <li class="flex justify-between gap-x-6 py-5 shadow-md hover:shadow-2xl hover:duration-700 bg-gray-100 p-4 mt-4">
                        <div class="flex min-w-0 gap-x-4">
                            <img class="h-12 w-12 flex-none rounded-full ring-4 ring-red-500 bg-gray-50" src="https://images.unsplash.com/photo-1519244703995-f4e0f30006d5?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                            <div class="min-w-0 flex-auto">
                                <p class="text-sm font-semibold leading-6 text-gray-900">Name: Michael Foster</p>
                                <p class="mt-1 truncate text-xs leading-5 text-gray-500">Age: 30</p>
                            </div>
                        </div>
                    </li>
                    <li class="flex justify-between gap-x-6 py-5 shadow-md hover:shadow-2xl hover:duration-700 bg-gray-100 p-4 mt-4">
                        <div class="flex min-w-0 gap-x-4">
                            <img class="h-12 w-12 flex-none rounded-full ring-4 ring-red-500 bg-gray-50" src="https://images.unsplash.com/photo-1519244703995-f4e0f30006d5?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                            <div class="min-w-0 flex-auto">
                                <p class="text-sm font-semibold leading-6 text-gray-900">Name: Michael Foster</p>
                                <p class="mt-1 truncate text-xs leading-5 text-gray-500">Age: 30</p>
                            </div>
                        </div>
                    </li>
                    <li class="flex justify-between gap-x-6 py-5 shadow-md hover:shadow-2xl hover:duration-700 bg-gray-100 p-4 mt-4">
                        <div class="flex min-w-0 gap-x-4">
                            <img class="h-12 w-12 flex-none rounded-full ring-4 ring-red-500 bg-gray-50" src="https://images.unsplash.com/photo-1519244703995-f4e0f30006d5?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                            <div class="min-w-0 flex-auto">
                                <p class="text-sm font-semibold leading-6 text-gray-900">Name: Michael Foster</p>
                                <p class="mt-1 truncate text-xs leading-5 text-gray-500">Age: 30</p>
                            </div>
                        </div>
                    </li>
                    <li class="flex justify-between gap-x-6 py-5 shadow-md hover:shadow-2xl hover:duration-700 bg-gray-100 p-4 mt-4">
                        <div class="flex min-w-0 gap-x-4">
                            <img class="h-12 w-12 flex-none rounded-full ring-4 ring-red-500 bg-gray-50" src="https://images.unsplash.com/photo-1519244703995-f4e0f30006d5?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                            <div class="min-w-0 flex-auto">
                                <p class="text-sm font-semibold leading-6 text-gray-900">Name: Michael Foster</p>
                                <p class="mt-1 truncate text-xs leading-5 text-gray-500">Age: 30</p>
                            </div>
                        </div>
                    </li>
                    <li class="flex justify-between gap-x-6 py-5 shadow-md hover:shadow-2xl hover:duration-700 bg-gray-100 p-4 mt-4">
                        <div class="flex min-w-0 gap-x-4">
                            <img class="h-12 w-12 flex-none rounded-full ring-4 ring-red-500 bg-gray-50" src="https://images.unsplash.com/photo-1519244703995-f4e0f30006d5?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                            <div class="min-w-0 flex-auto">
                                <p class="text-sm font-semibold leading-6 text-gray-900">Name: Michael Foster</p>
                                <p class="mt-1 truncate text-xs leading-5 text-gray-500">Age: 30</p>
                            </div>
                        </div>
                    </li>
                    <li class="flex justify-between gap-x-6 py-5 shadow-md hover:shadow-2xl hover:duration-700 bg-gray-100 p-4 mt-4">
                        <div class="flex min-w-0 gap-x-4">
                            <img class="h-12 w-12 flex-none rounded-full ring-4 ring-red-500 bg-gray-50" src="https://images.unsplash.com/photo-1519244703995-f4e0f30006d5?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                            <div class="min-w-0 flex-auto">
                                <p class="text-sm font-semibold leading-6 text-gray-900">Name: Michael Foster</p>
                                <p class="mt-1 truncate text-xs leading-5 text-gray-500">Age: 30</p>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        let map, infoWindow;

        function initMap() {
            map = new google.maps.Map(document.getElementById("map"), {
                center: {
                    lat: 8.4636264,
                    lng: 124.6405098
                },
                zoom: 15,
            });
            infoWindow = new google.maps.InfoWindow();

            const locationButton = document.createElement("button");

            locationButton.textContent = "Pan to Current Location";
            locationButton.classList.add("custom-map-control-button");
            map.controls[google.maps.ControlPosition.TOP_CENTER].push(locationButton);
            locationButton.addEventListener("click", () => {
                // Try HTML5 geolocation.
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(
                        (position) => {
                            const pos = {
                                lat: position.coords.latitude,
                                lng: position.coords.longitude,
                            };

                            infoWindow.setPosition(pos);
                            infoWindow.setContent("Location found.");
                            infoWindow.open(map);
                            map.setCenter(pos);
                        },
                        () => {
                            handleLocationError(true, infoWindow, map.getCenter());
                        },
                    );
                } else {
                    // Browser doesn't support Geolocation
                    handleLocationError(false, infoWindow, map.getCenter());
                }
            });
        }

        function handleLocationError(browserHasGeolocation, infoWindow, pos) {
            infoWindow.setPosition(pos);
            infoWindow.setContent(
                browserHasGeolocation ?
                "Error: The Geolocation service failed." :
                "Error: Your browser doesn't support geolocation.",
            );
            infoWindow.open(map);
        }

        window.initMap = initMap;

        const audio = new Audio('assets/alarm.mp3');

        // Pag-alarm sa speaker
        function alarm() {
            audio.play();
            alert('Admin notification received!');
        }

        window.alarm = alarm;
    </script>

    <script type="text/javascript" src="https://maps.google.com/maps/api/js?key={{ env('GOOGLE_MAP_KEY') }}&callback=initMap"></script>

</x-app-layout>