<x-app-layout>
    <!-- <x-slot name="header">
        {{ __('COGON STATION:') }}
    </x-slot>

    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 border-b border-gray-200">
            {{ __('You are logged in!') }}
        </div>
    </div> -->
    <div class="flex item-center grid grid-cols-3 gap-3 mt-4 m-2 p-2">
        <div>
            <h2 class="font-bold">COGON STATION: 1</h2>
            <div x-data="imageSlider" class="relative mx-auto max-w-2xl overflow-hidden rounded-md bg-gray-100 p-2 sm:p-4 mt-4">
                <div class="absolute right-5 top-5 z-10 rounded-full bg-gray-600 px-2 text-center text-sm text-white">
                    <span x-text="currentIndex"></span>/<span x-text="images.length"></span>
                </div>

                <button @click="previous()" class="absolute left-5 top-1/2 z-10 flex h-11 w-11 -translate-y-1/2 items-center justify-center rounded-full bg-gray-100 shadow-md">
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
                </button>

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
                            <img class="inline-block h-20 w-20 rounded-full ring-4 ring-yellow-600 m-2" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                        </div>
                    </div>
                    <div>
                        <h4>Name: James Simene</h4>
                        <h4>Age: 25</h4>
                        <h4>Location: Lower Tambo Macasandig Cagayan de oro</h4>
                    </div>
                </div>
                <div class="flex item-center grid grid-cols-2 gap-2 mt-4">
                    <div class="flex min-w-0 gap-x-4">
                        <div class="min-w-0 flex-auto">
                            <label for="type_of_fire">Type of Fire: </label>
                            <select name="type_of_fire" id="type_of_fire" class="rounded">
                                <option value="test">
                                    Select
                                </option>
                                <option value="test">
                                    Residential
                                </option>
                                <option value="test1">
                                    Warehouse
                                </option>
                                <option value="test1">
                                    Rubbish Fire
                                </option>
                                <option value="test1">
                                    Electric Post Fire
                                </option>
                                <option value="test1">
                                    Structural
                                </option>
                                <option value="test1">
                                    Grass Fire
                                </option>
                                <option value="test1">
                                    Forest Fire
                                </option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <button class="p-2 pl-6 pr-6 bg-red-500 rounded-full text-white text-sm shadow-lg hover:shadow-red-500/50 hover:duration-700">SEND ALARM</button>
                    </div>
                </div>
            </div>
            <div class="shadow-md mt-4 relative mx-auto max-w-2xl overflow-hidden rounded-md bg-gray-100 p-2 sm:p-4">
                <h4 class="font-bold">OTHER STATIONS NEARBY: </h4>
                <ul role="list" class="divide-y divide-gray-100">
                    <li class="flex justify-between gap-x-6 py-5">
                        <p>Cagayan de oro city fire department</p>
                        <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
                            <button class="pl-6 pr-6 bg-red-600 rounded-full text-white text-sm p-1 shadow-lg hover:shadow-red-500/50 hover:duration-700">SEND</button>
                        </div>
                    </li>
                    <li class="flex justify-between gap-x-6 py-5">
                        <p>Cagayan de oro city fire department</p>
                        <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
                            <button class="pl-6 pr-6 bg-red-600 rounded-full text-white text-sm p-1 shadow-lg hover:shadow-red-500/50 hover:duration-700">SEND</button>
                        </div>
                    </li>
                    <li class="flex justify-between gap-x-6 py-5">
                        <p>Cagayan de oro city fire department</p>
                        <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
                            <button class="pl-6 pr-6 bg-red-600 rounded-full text-white text-sm p-1 shadow-lg hover:shadow-red-500/50 hover:duration-700">SEND</button>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div>
            <h2 class="font-bold">CURRENTLY IN TERRAIN</h2>
            <div class="relative mx-auto max-w-2xl overflow-hidden rounded-md bg-gray-100 p-2 sm:p-4 mt-4">
                <ul role="list" class="divide-y divide-gray-100">
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
                    </li>
                </ul>
            </div>
        </div>
        <div>
            <h2 class="font-bold">LATEST SENDER</h2>
            <div class="relative mx-auto max-w-2xl overflow-hidden rounded-md bg-gray-100 p-2 sm:p-4 mt-4">
                <ul role="list" class="divide-y divide-gray-100">
                    <li class="flex justify-between gap-x-6 py-5 p-4 shadow-md hover:shadow-2xl hover:duration-700 rounded mt-4">
                        <div class="flex min-w-0 gap-x-4">
                            <img class="h-12 w-12 flex-none rounded-full bg-gray-50 ring-4 ring-yellow-600 m-2" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                            <div class="min-w-0 flex-auto">
                                <p class="text-sm font-semibold leading-6 text-gray-900">Name: Leslie Alexander</p>
                                <p class="mt-1 truncate text-xs leading-5 text-gray-500">Age: 28</p>
                                <p class="mt-1 truncate text-xs leading-5 text-gray-500">Location: Rm. 310 Natividad Building, Escolta Street</p>
                            </div>
                        </div>
                    </li>
                    <li class="flex justify-between gap-x-6 py-5 p-4 shadow-md hover:shadow-2xl hover:duration-700 rounded mt-4">
                        <div class="flex min-w-0 gap-x-4">
                            <img class="h-12 w-12 flex-none rounded-full bg-gray-50 ring-4 ring-yellow-600 m-2" src="https://images.unsplash.com/photo-1519244703995-f4e0f30006d5?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                            <div class="min-w-0 flex-auto">
                                <p class="text-sm font-semibold leading-6 text-gray-900">Name: Michael Foster</p>
                                <p class="mt-1 truncate text-xs leading-5 text-gray-500">Age: 30</p>
                                <p class="mt-1 truncate text-xs leading-5 text-gray-500">Location: 4010 Yague Street1200</p>
                            </div>
                        </div>
                    </li>
                    <li class="flex justify-between gap-x-6 py-5 p-4 shadow-md hover:shadow-2xl hover:duration-700 rounded mt-4">
                        <div class="flex min-w-0 gap-x-4">
                            <img class="h-12 w-12 flex-none rounded-full bg-gray-50 ring-4 ring-yellow-600 m-2" src="https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                            <div class="min-w-0 flex-auto">
                                <p class="text-sm font-semibold leading-6 text-gray-900">Name: Dries Vincent</p>
                                <p class="mt-1 truncate text-xs leading-5 text-gray-500">Age: 24</p>
                                <p class="mt-1 truncate text-xs leading-5 text-gray-500">Location: 1716 President Quirino Avenue, Pandacan</p>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    document.addEventListener("alpine:init", () => {
        Alpine.data("imageSlider", () => ({
            currentIndex: 1,
            images: [
                "https://unsplash.it/640/425?image=30",
                "https://unsplash.it/640/425?image=40",
                "https://unsplash.it/640/425?image=50",
            ],
            previous() {
                if (this.currentIndex > 1) {
                    this.currentIndex = this.currentIndex - 1;
                }
            },
            forward() {
                if (this.currentIndex < this.images.length) {
                    this.currentIndex = this.currentIndex + 1;
                }
            },
        }));
    });
</script>