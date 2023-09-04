<x-app-layout>
    <x-slot name="header">
        {{ __('Locations') }}
    </x-slot>

    <div class="flex item-center grid grid-cols-4 gap-5 mt-4 m-2 p-2">
        <div class="col-span-3">
            <div class="shadow-md mt-4 relative mx-auto w-full overflow-hidden rounded-md bg-gray-100 p-2 sm:p-4 h-auto">
                <div id="map" class="h-96 w-full rounded"></div>
            </div>
        </div>
        <div>
            <div class="shadow-md mt-4 relative mx-auto max-w-2xl overflow-hidden rounded-md bg-gray-100 p-2 sm:p-4">
                <h5 class="font-bold">
                    FIREFIGHTER ON DUTY:
                    <select name="type_of_fire" id="type_of_fire" class="rounded">
                        <option value="test">
                            Select
                        </option>
                        <option value="1">
                            1
                        </option>
                        <option value="2">
                            2
                        </option>
                        <option value="3">
                            3
                        </option>
                        <option value="4">
                            4
                        </option>
                    </select>
                </h5>
                <ul role="list" class="divide-y divide-gray-100 overflow-y-scroll max-h-screen h-96">
                    <li class="flex justify-between gap-x-6 py-5 shadow-md hover:shadow-2xl hover:duration-700 bg-gray-100 p-4 mt-4">
                        <div class="flex min-w-0 gap-x-4">
                            <img class="h-12 w-12 flex-none rounded-full bg-gray-50" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                            <div class="min-w-0 flex-auto">
                                <p class="text-sm font-semibold leading-6 text-gray-900">Name: Leslie Alexander</p>
                                <p class="mt-1 truncate text-xs leading-5 text-gray-500">Age: 25</p>
                            </div>
                        </div>
                    </li>
                    <li class="flex justify-between gap-x-6 py-5 shadow-md hover:shadow-2xl hover:duration-700 bg-gray-100 p-4 mt-4">
                        <div class="flex min-w-0 gap-x-4">
                            <img class="h-12 w-12 flex-none rounded-full bg-gray-50" src="https://images.unsplash.com/photo-1519244703995-f4e0f30006d5?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                            <div class="min-w-0 flex-auto">
                                <p class="text-sm font-semibold leading-6 text-gray-900">Name: Michael Foster</p>
                                <p class="mt-1 truncate text-xs leading-5 text-gray-500">Age: 30</p>
                            </div>
                        </div>
                    </li>
                    <li class="flex justify-between gap-x-6 py-5 shadow-md hover:shadow-2xl hover:duration-700 bg-gray-100 p-4 mt-4">
                        <div class="flex min-w-0 gap-x-4">
                            <img class="h-12 w-12 flex-none rounded-full bg-gray-50" src="https://images.unsplash.com/photo-1519244703995-f4e0f30006d5?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                            <div class="min-w-0 flex-auto">
                                <p class="text-sm font-semibold leading-6 text-gray-900">Name: Michael Foster</p>
                                <p class="mt-1 truncate text-xs leading-5 text-gray-500">Age: 30</p>
                            </div>
                        </div>
                    </li>
                    <li class="flex justify-between gap-x-6 py-5 shadow-md hover:shadow-2xl hover:duration-700 bg-gray-100 p-4 mt-4">
                        <div class="flex min-w-0 gap-x-4">
                            <img class="h-12 w-12 flex-none rounded-full bg-gray-50" src="https://images.unsplash.com/photo-1519244703995-f4e0f30006d5?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                            <div class="min-w-0 flex-auto">
                                <p class="text-sm font-semibold leading-6 text-gray-900">Name: Michael Foster</p>
                                <p class="mt-1 truncate text-xs leading-5 text-gray-500">Age: 30</p>
                            </div>
                        </div>
                    </li>
                    <li class="flex justify-between gap-x-6 py-5 shadow-md hover:shadow-2xl hover:duration-700 bg-gray-100 p-4 mt-4">
                        <div class="flex min-w-0 gap-x-4">
                            <img class="h-12 w-12 flex-none rounded-full bg-gray-50" src="https://images.unsplash.com/photo-1519244703995-f4e0f30006d5?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                            <div class="min-w-0 flex-auto">
                                <p class="text-sm font-semibold leading-6 text-gray-900">Name: Michael Foster</p>
                                <p class="mt-1 truncate text-xs leading-5 text-gray-500">Age: 30</p>
                            </div>
                        </div>
                    </li>
                    <li class="flex justify-between gap-x-6 py-5 shadow-md hover:shadow-2xl hover:duration-700 bg-gray-100 p-4 mt-4">
                        <div class="flex min-w-0 gap-x-4">
                            <img class="h-12 w-12 flex-none rounded-full bg-gray-50" src="https://images.unsplash.com/photo-1519244703995-f4e0f30006d5?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                            <div class="min-w-0 flex-auto">
                                <p class="text-sm font-semibold leading-6 text-gray-900">Name: Michael Foster</p>
                                <p class="mt-1 truncate text-xs leading-5 text-gray-500">Age: 30</p>
                            </div>
                        </div>
                    </li>
                    <li class="flex justify-between gap-x-6 py-5 shadow-md hover:shadow-2xl hover:duration-700 bg-gray-100 p-4 mt-4">
                        <div class="flex min-w-0 gap-x-4">
                            <img class="h-12 w-12 flex-none rounded-full bg-gray-50" src="https://images.unsplash.com/photo-1519244703995-f4e0f30006d5?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                            <div class="min-w-0 flex-auto">
                                <p class="text-sm font-semibold leading-6 text-gray-900">Name: Michael Foster</p>
                                <p class="mt-1 truncate text-xs leading-5 text-gray-500">Age: 30</p>
                            </div>
                        </div>
                    </li>
                    <li class="flex justify-between gap-x-6 py-5 shadow-md hover:shadow-2xl hover:duration-700 bg-gray-100 p-4 mt-4">
                        <div class="flex min-w-0 gap-x-4">
                            <img class="h-12 w-12 flex-none rounded-full bg-gray-50" src="https://images.unsplash.com/photo-1519244703995-f4e0f30006d5?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                            <div class="min-w-0 flex-auto">
                                <p class="text-sm font-semibold leading-6 text-gray-900">Name: Michael Foster</p>
                                <p class="mt-1 truncate text-xs leading-5 text-gray-500">Age: 30</p>
                            </div>
                        </div>
                    </li>
                    <li class="flex justify-between gap-x-6 py-5 shadow-md hover:shadow-2xl hover:duration-700 bg-gray-100 p-4 mt-4">
                        <div class="flex min-w-0 gap-x-4">
                            <img class="h-12 w-12 flex-none rounded-full bg-gray-50" src="https://images.unsplash.com/photo-1519244703995-f4e0f30006d5?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
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
        function initMap() {
            const myLatLng = {
                lat: 8.4636264,
                lng: 124.6405098
            };
            const map = new google.maps.Map(document.getElementById("map"), {
                zoom: 15,
                center: myLatLng,
            });

            new google.maps.Marker({
                position: myLatLng,
                map,
                title: "Firease",
            });
        }

        window.initMap = initMap;
    </script>

    <script type="text/javascript" src="https://maps.google.com/maps/api/js?key={{ env('GOOGLE_MAP_KEY') }}&callback=initMap"></script>

</x-app-layout>