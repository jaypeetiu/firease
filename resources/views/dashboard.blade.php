<x-app-layout>
    <!-- <x-slot name="header">
        {{ __('COGON STATION:') }}
    </x-slot>

    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 border-b border-gray-200">
            {{ __('You are logged in!') }}
        </div>
    </div> -->
    <audio id="alertAudio">
        <source src="{{ asset('assets/alarm.mp3') }}" type="audio/mpeg">
        Your browser does not support the audio element.
    </audio>
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
    <div class="flex item-center grid grid-cols-3 gap-3 mt-4 m-2 p-2">
        @if ($latestsender !== null && $latestsender->user !== null)
        @can('admin_access')
        <div>
            <h2 class="font-bold">COGON STATION: 1</h2>
            <div x-data="imageSlider" class="relative mx-auto max-w-2xl overflow-hidden rounded-md bg-gray-100 p-2 sm:p-4 mt-4">
                <div class="absolute right-5 top-5 z-10 rounded-full bg-gray-600 px-2 text-center text-sm text-white">
                    <span x-text="currentIndex"></span>/<span x-text="images.length"></span>
                </div>

                <!-- <button @click="previous()" class="absolute left-5 top-1/2 z-10 flex h-11 w-11 -translate-y-1/2 items-center justify-center rounded-full bg-gray-100 shadow-md">
                    <svg class="h-8 w-8 text-red-500" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" />
                        <line x1="5" y1="12" x2="19" y2="12" />
                        <line x1="5" y1="12" x2="11" y2="18" />
                        <line x1="5" y1="12" x2="11" y2="6" />
                    </svg>
                </button>

                <button @click="forward()" class="absolute right-5 top-1/2 z-10 flex h-11 w-11 -translate-y-1/2 items-center justify-center rounded-full bg-gray-100 shadow-md">
                    <svg class="h-8 w-8 text-red-500" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" />
                        <line x1="5" y1="12" x2="19" y2="12" />
                        <line x1="13" y1="18" x2="19" y2="12" />
                        <line x1="13" y1="6" x2="19" y2="12" />
                    </svg>
                </button> -->

                <div class="relative h-80" style="width: auto">
                    <template x-for="(image, index) in images">
                        <div x-show="currentIndex == index + 1" x-transition:enter="transition transform duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition transform duration-300" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="absolute top-0">
                            <img :src="image" alt="image" class="rounded-sm" />
                        </div>
                    </template>
                </div>
            </div>
            <div class="shadow-md mt-4 relative mx-auto max-w-2xl overflow-hidden rounded-md bg-gray-100 p-2 sm:p-4">
                <div class="flex item-center grid grid-cols-2 gap-2 mt-4">
                    <div>
                        <div class="flex -space-x-2 overflow-hidden">
                            <img class="inline-block h-20 w-20 rounded-full ring-4 ring-yellow-600 m-2" src="{{$latestsender->user->avatar?$latestsender->user->avatar:'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80'}}" alt="">
                        </div>
                    </div>
                    <div>
                        <h4>Name: {{$latestsender->user->name}}</h4>
                        <h4>Age: {{$latestsender->user->age?$latestsender->user->age:0}}</h4>
                        <h4>Location: {{$latestsender->user->location?$latestsender->user->location : 'Rm. 310 Natividad Building, Escolta Street'}}</h4>
                    </div>
                </div>
                <form method="post" action="{{ route('post.update') }}" autocomplete="off">
                    @csrf
                    <div class="flex item-center grid grid-cols-2 gap-2 mt-4">
                        <div class="flex min-w-0 gap-x-4">
                            <div class="min-w-0 flex-auto">
                                <input name="id" value='{{$latestsender->id}}' hidden />
                                <label for="fire_type">Type of Fire: </label>
                                <select name="fire_type" id="fire_type" class="rounded max-w-full">
                                    <option>
                                        Select
                                    </option>
                                    @foreach($firetypes as $id => $firetype)
                                    <option value="{{ $firetype }}" {{ $latestsender->fire_type == $firetype ? 'selected' : '' }}>
                                        {{ $firetype }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="place-self-center">
                            <button type="submit" class="p-2 pl-6 pr-6 bg-red-500 rounded-full text-white text-sm shadow-lg hover:shadow-red-500/50 hover:duration-700">SEND ALARM</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="shadow-md mt-4 relative mx-auto max-w-2xl overflow-hidden rounded-md bg-gray-100 p-2 sm:p-4">
                <h4 class="font-bold">OTHER STATIONS NEARBY: </h4>
                <ul role="list" class="divide-y divide-gray-100">

                    @foreach($stations as $station)
                    <form method="post" action="{{ route('notify.stations', $station->id) }}" autocomplete="off">
                        @csrf
                        <li class="flex justify-between gap-x-6 py-5 items-center">
                            <p>{{$station->name}}</p>
                            <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
                                <button class="pl-6 pr-6 bg-red-600 rounded-full text-white text-sm p-1 shadow-lg hover:shadow-red-500/50 hover:duration-700">SEND</button>
                            </div>
                        </li>
                    </form>
                    @endforeach
                </ul>
            </div>
        </div>
        @elseif ($latestsender === null)
        <div>
            <h2 class="font-bold">COGON STATION: 1</h2>
            <div class="shadow-md mt-4 relative mx-auto max-w-2xl overflow-hidden rounded-md bg-gray-100 p-2 sm:p-4">
                No Reported Incidents
            </div>
        </div>
        @endif
        @endcan
        @can('admin_access')
        <div>
            <h2 class="font-bold">
                Vehicle On Response
            </h2>
            <div class="relative mx-auto max-w-2xl overflow-hidden rounded-md bg-gray-100 p-2 sm:p-4 mt-4">
                <form method="post" action="{{ route('post.vehicle', $latestsender->id) }}" autocomplete="off">
                    @csrf
                    <label for="vehicle_type">Choose Vehicle</label>
                    <select name="vehicle_type" id="vehicle_type" class="rounded max-w-full">
                        <option>
                            Select
                        </option>
                        @foreach($vehicles as $vehicle)
                        <option value="{{ $vehicle->id }}" {{ $latestsender->vehicle == $vehicle->name ? 'selected' : '' }}>
                            {{$vehicle->name}}
                        </option>
                        @endforeach
                    </select>
                    <button type="submit" class="p-2 pl-6 pr-6 bg-red-500 rounded text-white text-sm shadow-lg hover:shadow-red-500/50 hover:duration-700" style="float:right;">UPDATE</button>
                </form>
                <ul role="list" class="divide-y divide-gray-100">
                    @foreach($histories as $history)
                    <?php
                    $dataTimestamp = strtotime($history->created_at);
                    $currentTime = time();
                    $secondsAgo = $currentTime - $dataTimestamp;
                    ?>
                    <li class="flex justify-between gap-x-6 py-5 p-4 shadow-md hover:shadow-2xl hover:duration-700 rounded mt-4">
                        <div class="flex min-w-0 gap-x-4">
                            <svg class="h-8 w-8 text-red-500" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" />
                                <circle cx="5" cy="17" r="2" />
                                <circle cx="17" cy="17" r="2" />
                                <path d="M7 18h8m4 0h2v-6a5 5 0 0 0 -5 -5h-1l1.5 5h4.5" />
                                <path d="M12 18v-11h3" />
                                <polyline points="3 17 3 12 12 12" />
                                <line x1="3" y1="9" x2="21" y2="3" />
                                <line x1="6" y1="12" x2="6" y2="8" />
                            </svg>
                            {{$history->vehicle}}
                            <div class="min-w-0 flex-auto">
                                <p class="text-sm font-semibold leading-6 text-gray-900">{{$secondsAgo}} Seconds Ago</p>
                            </div>
                        </div>
                        <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
                            <svg class="h-8 w-8 text-red-500" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" />
                                <circle cx="12" cy="12" r="1" />
                                <circle cx="12" cy="19" r="1" />
                                <circle cx="12" cy="5" r="1" />
                            </svg>
                        </div>
                    </li>
                    @endforeach
                    <!-- <li class="flex justify-between gap-x-6 py-5 p-4 shadow-md hover:shadow-2xl hover:duration-700 rounded mt-4">
                        <div class="flex min-w-0 gap-x-4">
                            <svg class="h-8 w-8 text-red-500" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" />
                                <circle cx="5" cy="17" r="2" />
                                <circle cx="17" cy="17" r="2" />
                                <path d="M7 18h8m4 0h2v-6a5 5 0 0 0 -5 -5h-1l1.5 5h4.5" />
                                <path d="M12 18v-11h3" />
                                <polyline points="3 17 3 12 12 12" />
                                <line x1="3" y1="9" x2="21" y2="3" />
                                <line x1="6" y1="12" x2="6" y2="8" />
                            </svg>
                            <div class="min-w-0 flex-auto">
                                <p class="text-sm font-semibold leading-6 text-gray-900">24 Seconds Ago</p>
                            </div>
                        </div>
                        <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
                            <svg class="h-8 w-8 text-red-500" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" />
                                <circle cx="12" cy="12" r="1" />
                                <circle cx="12" cy="19" r="1" />
                                <circle cx="12" cy="5" r="1" />
                            </svg>
                        </div>
                    </li>
                    <li class="flex justify-between gap-x-6 py-5 p-4 shadow-md hover:shadow-2xl hover:duration-700 rounded mt-4">
                        <div class="flex min-w-0 gap-x-4">
                            <svg class="h-8 w-8 text-red-500" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" />
                                <circle cx="5" cy="17" r="2" />
                                <circle cx="17" cy="17" r="2" />
                                <path d="M7 18h8m4 0h2v-6a5 5 0 0 0 -5 -5h-1l1.5 5h4.5" />
                                <path d="M12 18v-11h3" />
                                <polyline points="3 17 3 12 12 12" />
                                <line x1="3" y1="9" x2="21" y2="3" />
                                <line x1="6" y1="12" x2="6" y2="8" />
                            </svg>
                            <div class="min-w-0 flex-auto">
                                <p class="text-sm font-semibold leading-6 text-gray-900">24 Seconds Ago</p>
                            </div>
                        </div>
                        <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
                            <svg class="h-8 w-8 text-red-500" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" />
                                <circle cx="12" cy="12" r="1" />
                                <circle cx="12" cy="19" r="1" />
                                <circle cx="12" cy="5" r="1" />
                            </svg>
                        </div>
                    </li> -->
                </ul>
            </div>
        </div>
        @endcan
        <div>
            <h2 class="font-bold">LATEST SENDER</h2>
            <div class="relative mx-auto max-w-2xl overflow-hidden min-h-screen rounded-md bg-gray-100 p-2 sm:p-4 mt-4">
                <ul role="list" class="divide-y divide-gray-100 overflow-scroll max-h-screen">
                    @foreach($latests as $latest)
                    <li class="flex justify-between gap-x-6 py-5 p-4 shadow-md hover:shadow-2xl hover:duration-700 rounded mt-4">
                        <a href="{{route('dashboard.show', $latest->id)}}">
                            <div class="flex min-w-0 gap-x-4">
                                <img class="h-12 w-12 flex-none rounded-full bg-gray-50 ring-4 ring-yellow-600 m-2" src="{{$latest->user->avatar?$latest->user->avatar: 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80'}}" alt="">
                                <div class="min-w-0 flex-auto">
                                    <p class="text-sm font-semibold leading-6 text-gray-900">Name: {{$latest->user->name}}</p>
                                    <p class="mt-1 truncate text-xs leading-5 text-gray-500">Age: {{ $latest->user->age? $latest->user->age: 0 }}</p>
                                    <p class="mt-1 truncate text-xs leading-5 text-gray-500">Location: {{$latest->user->location ? $latest->user->location : 'Rm. 310 Natividad Building, Escolta Street'}}</p>
                                </div>
                            </div>
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
        @can('super_access')
        <div class="col-span-2">
            <div class="flex item-center grid grid-cols-2 gap-3 ">
                <h2 class="font-bold flex flex-row">ON RESCUE</h2>
                <select name="fire_type" id="fire_type" class="rounded max-w-full">
                    <option>
                        Select
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
            <div class="relative w-full overflow-hidden rounded-md bg-gray-100 p-2 sm:p-4 mt-4">
                <div class="flex min-w-0 gap-x-4">
                    <div class="min-w-0 flex-none">
                        <img class="h-12 w-12 flex-none rounded-full bg-gray-50 ring-4 ring-yellow-600 m-2" src="{{$latest->user->avatar?$latest->user->avatar: 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80'}}" alt="">
                        <p class="text-center mt-1 truncate text-xs leading-5 text-yellow-600">Responder</p>
                    </div>
                    <div class="min-w-0 flex-auto">
                        <p class="text-sm font-semibold leading-6 text-gray-900">Name: {{$latest->user->name}}</p>
                        <p class="mt-1 truncate text-xs leading-5 text-gray-500">Age: {{ $latest->user->age? $latest->user->age: 0 }}</p>
                        <p class="mt-1 truncate text-xs leading-5 text-gray-500">Location: {{$latest->user->location ? $latest->user->location : 'Rm. 310 Natividad Building, Escolta Street'}}</p>
                    </div>
                </div>
                <div class="flex min-w-0 gap-x-4">
                    <img class="h-64 w-64 flex-none rounded bg-gray-50 m-2" src="{{$latest->user->avatar?$latest->user->avatar: 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80'}}" alt="">
                    <div class="min-w-0 flex-auto">
                        <p class="text-sm font-semibold leading-6 text-gray-900">Details</p>
                        <p class="mt-1 truncate text-xs leading-5 text-gray-500">Type of fire: {{ $latest->user->age? $latest->user->age: 0 }}</p>
                        <p class="text-sm font-semibold leading-6 text-gray-900">Response Needed: </p>
                        <p class="text-sm font-semibold leading-6 text-gray-900 inline-flex">
                            <img class="h-12 w-12 rounded m-2" src="{{$latest->user->avatar?$latest->user->avatar: 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80'}}" alt="">
                            <img class="h-12 w-12 rounded m-2" src="{{$latest->user->avatar?$latest->user->avatar: 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80'}}" alt="">
                            <img class="h-12 w-12 rounded m-2" src="{{$latest->user->avatar?$latest->user->avatar: 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80'}}" alt="">
                        </p>
                        <!-- <p class="text-sm font-semibold leading-6 text-gray-900">RESPONDERS: </p> -->
                    </div>
                </div>
            </div>
        </div>
        @endcan
    </div>
</x-app-layout>
<script>
    // const audio = new Audio('assets/alarm.mp3');

    // // Pag-alarm sa speaker
    // function alarm() {
    //     audio.play();
    //     alert('Admin notification received!');
    // }
    document.addEventListener("alpine:init", () => {
        Alpine.data("imageSlider", () => ({
            currentIndex: 1,
            images: [
                "{{$latestsender->image}}",
            ],
            // previous() {
            //     if (this.currentIndex > 1) {
            //         this.currentIndex = this.currentIndex - 1;
            //     }
            // },
            // forward() {
            //     if (this.currentIndex < this.images.length) {
            //         this.currentIndex = this.currentIndex + 1;
            //     }
            // },
        }));
    });
</script>