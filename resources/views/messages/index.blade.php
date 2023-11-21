<x-app-layout>
    <x-slot name="header">
        {{ __('Messages') }}
    </x-slot>

    <div class="flex item-center grid grid-cols-3 gap-5 mt-4 m-2 p-2">
        <div>
            <!-- <div class="shadow-md mt-4 relative mx-auto max-w-2xl overflow-hidden rounded-md bg-gray-100 p-2 sm:p-4">
                <div class="font-semibold">Fire Station: Admin</div>
            </div> -->
            <div class="mt-4 bg-white rounded-lg shadow-md p-6">

                <div class="flex flex-row flex-wrap border-b">
                    <div class="text-gray-600 w-full mb-4 p-2 font-semibold border-b">Fire Station: Admin</div>


                    <div class="px-2 py-1 text-white bg-blue-700 rounded mr-4 mb-4 self-center">
                        Patrick
                    </div>
                    <div class="py-4 text-gray-600 self-center">
                        No message available.
                    </div>
                </div>

                <template x-if="messages.length > 0">
                    <template x-for="message in messages" :key="message.id">
                        <div class="my-8">
                            <div class="flex flex-row justify-between border-b border-gray-200">
                                <span class="text-gray-600" x-text="message.user.name"></span>
                                <span class="text-gray-500 text-xs" x-text="message.created_at"></span>
                            </div>
                            <div class="my-4 text-gray-800" x-text="message.body"></div>
                        </div>
                    </template>
                </template>

                <template x-if="messages.length == 0">
                    <div class="py-4 text-gray-600">
                        It's quiet in here...
                    </div>
                </template>

                <div class="flex flex-row justify-between">
                    <input @keydown.enter="@this.call('sendMessage', messageBody) messageBody = ''"
                        x-model="messageBody"
                        class="mr-4 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        type="text" placeholder="Message">
                    <button @click="@this.call('sendMessage', messageBody) messageBody = ''"
                        class="btn btn-primary self-stretch">
                        Send
                    </button>
                </div>
                @error('messageBody') <div class="error mt-2">{{ $message }}</div> @enderror
            </div>
        </div>
        <div class="col-span-2">
            <div class="flex item-center inline-grid inline-block grid-cols-3 mt-4 w-full">
                <div>
                    <div class="flex min-w-0 gap-x-4">
                        <div class="h-12 w-12 flex-none rounded-full bg-red-700"></div>
                        <div class="min-w-0 flex-auto self-center">
                            <h2 class="min-w-0 flex-auto">ON RESPONSE</h2>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="flex min-w-0 gap-x-4">
                        <div class="h-12 w-12 flex-none rounded-full bg-green-700"></div>
                        <div class="min-w-0 flex-auto self-center">
                            <h2 class="min-w-0 flex-auto">AVAILABLE</h2>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="flex min-w-0 gap-x-4">
                        <div class="h-12 w-12 flex-none rounded-full bg-white"></div>
                        <div class="min-w-0 flex-auto self-center">
                            <h2 class="min-w-0 flex-auto">ON MAINTENANCE</h2>
                        </div>
                    </div>
                </div>
            </div>
            <ul role="list" class="divide-y divide-gray-100 overflow-y-scroll h-96">
                <div class="flex item-center inline-grid grid-cols-3 gap-5 mt-4 m-2 p-2">
                    <li class="flex justify-between gap-x-6 py-5 shadow-lg bg-gray-100 p-4 mt-4">
                        <div class="flex min-w-0 gap-x-4">
                            <div class="h-12 w-12 flex-none rounded-full bg-red-700"></div>
                            <div class="min-w-0 flex-auto">
                                <p class="text-sm font-semibold leading-6 text-gray-900">Station: Cogon</p>
                                <p class="mt-1 truncate text-xs leading-5 text-gray-500">Location: nazareth cagayan de
                                    oro</p>
                            </div>
                        </div>
                    </li>
                    <li class="flex justify-between gap-x-6 py-5 shadow-lg bg-gray-100 p-4 mt-4">
                        <div class="flex min-w-0 gap-x-4">
                            <div class="h-12 w-12 flex-none rounded-full bg-green-700"></div>
                            <div class="min-w-0 flex-auto">
                                <p class="text-sm font-semibold leading-6 text-gray-900">Station: Cogon</p>
                                <p class="mt-1 truncate text-xs leading-5 text-gray-500">Location: nazareth cagayan de
                                    oro</p>
                            </div>
                        </div>
                    </li>
                    <li class="flex justify-between gap-x-6 py-5 shadow-lg bg-gray-100 p-4 mt-4">
                        <div class="flex min-w-0 gap-x-4">
                            <div class="h-12 w-12 flex-none rounded-full bg-green-700"></div>
                            <div class="min-w-0 flex-auto">
                                <p class="text-sm font-semibold leading-6 text-gray-900">Station: Cogon</p>
                                <p class="mt-1 truncate text-xs leading-5 text-gray-500">Location: nazareth cagayan de
                                    oro</p>
                            </div>
                        </div>
                    </li>
                    <li class="flex justify-between gap-x-6 py-5 shadow-lg bg-gray-100 p-4 mt-4">
                        <div class="flex min-w-0 gap-x-4">
                            <div class="h-12 w-12 flex-none rounded-full bg-red-700"></div>
                            <div class="min-w-0 flex-auto">
                                <p class="text-sm font-semibold leading-6 text-gray-900">Station: Cogon</p>
                                <p class="mt-1 truncate text-xs leading-5 text-gray-500">Location: nazareth cagayan de
                                    oro</p>
                            </div>
                        </div>
                    </li>
                    <li class="flex justify-between gap-x-6 py-5 shadow-lg bg-gray-100 p-4 mt-4">
                        <div class="flex min-w-0 gap-x-4">
                            <div class="h-12 w-12 flex-none rounded-full bg-green-700"></div>
                            <div class="min-w-0 flex-auto">
                                <p class="text-sm font-semibold leading-6 text-gray-900">Station: Cogon</p>
                                <p class="mt-1 truncate text-xs leading-5 text-gray-500">Location: nazareth cagayan de
                                    oro</p>
                            </div>
                        </div>
                    </li>
                    <li class="flex justify-between gap-x-6 py-5 shadow-lg bg-gray-100 p-4 mt-4">
                        <div class="flex min-w-0 gap-x-4">
                            <div class="h-12 w-12 flex-none rounded-full bg-green-700"></div>
                            <div class="min-w-0 flex-auto">
                                <p class="text-sm font-semibold leading-6 text-gray-900">Station: Cogon</p>
                                <p class="mt-1 truncate text-xs leading-5 text-gray-500">Location: nazareth cagayan de
                                    oro</p>
                            </div>
                        </div>
                    </li>
                    <li class="flex justify-between gap-x-6 py-5 shadow-lg bg-gray-100 p-4 mt-4">
                        <div class="flex min-w-0 gap-x-4">
                            <div class="h-12 w-12 flex-none rounded-full bg-green-700"></div>
                            <div class="min-w-0 flex-auto">
                                <p class="text-sm font-semibold leading-6 text-gray-900">Station: Cogon</p>
                                <p class="mt-1 truncate text-xs leading-5 text-gray-500">Location: nazareth cagayan de
                                    oro</p>
                            </div>
                        </div>
                    </li>
                    <li class="flex justify-between gap-x-6 py-5 shadow-lg bg-gray-100 p-4 mt-4">
                        <div class="flex min-w-0 gap-x-4">
                            <div class="h-12 w-12 flex-none rounded-full bg-green-700"></div>
                            <div class="min-w-0 flex-auto">
                                <p class="text-sm font-semibold leading-6 text-gray-900">Station: Cogon</p>
                                <p class="mt-1 truncate text-xs leading-5 text-gray-500">Location: nazareth cagayan de
                                    oro</p>
                            </div>
                        </div>
                    </li>
                    <li class="flex justify-between gap-x-6 py-5 shadow-lg bg-gray-100 p-4 mt-4">
                        <div class="flex min-w-0 gap-x-4">
                            <div class="h-12 w-12 flex-none rounded-full bg-green-700"></div>
                            <div class="min-w-0 flex-auto">
                                <p class="text-sm font-semibold leading-6 text-gray-900">Station: Cogon</p>
                                <p class="mt-1 truncate text-xs leading-5 text-gray-500">Location: nazareth cagayan de
                                    oro</p>
                            </div>
                        </div>
                    </li>
                    <li class="flex justify-between gap-x-6 py-5 shadow-lg bg-gray-100 p-4 mt-4">
                        <div class="flex min-w-0 gap-x-4">
                            <div class="h-12 w-12 flex-none rounded-full bg-green-700"></div>
                            <div class="min-w-0 flex-auto">
                                <p class="text-sm font-semibold leading-6 text-gray-900">Station: Cogon</p>
                                <p class="mt-1 truncate text-xs leading-5 text-gray-500">Location: nazareth cagayan de
                                    oro</p>
                            </div>
                        </div>
                    </li>
                    <li class="flex justify-between gap-x-6 py-5 shadow-lg bg-gray-100 p-4 mt-4">
                        <div class="flex min-w-0 gap-x-4">
                            <div class="h-12 w-12 flex-none rounded-full bg-green-700"></div>
                            <div class="min-w-0 flex-auto">
                                <p class="text-sm font-semibold leading-6 text-gray-900">Station: Cogon</p>
                                <p class="mt-1 truncate text-xs leading-5 text-gray-500">Location: nazareth cagayan de
                                    oro</p>
                            </div>
                        </div>
                    </li>
                    <li class="flex justify-between gap-x-6 py-5 shadow-lg bg-gray-100 p-4 mt-4">
                        <div class="flex min-w-0 gap-x-4">
                            <div class="h-12 w-12 flex-none rounded-full bg-green-700"></div>
                            <div class="min-w-0 flex-auto">
                                <p class="text-sm font-semibold leading-6 text-gray-900">Station: Cogon</p>
                                <p class="mt-1 truncate text-xs leading-5 text-gray-500">Location: nazareth cagayan de
                                    oro</p>
                            </div>
                        </div>
                    </li>
                </div>
            </ul>
            @can('super_access')
            <div class="flex item-center inline-grid inline-block grid-cols-3 mt-4 w-full">
                <div class="p-6">
                    <div class="flex-col min-w-0 gap-x-4 shadow-lg rounded bg-red-700 m-48 p-4 text-center">
                        <h2 class="text-white flex-auto text-2xl">Breaking News</h2>
                        <div class="flex flex-wrap justify-center pt-8">
                            <svg class="h-16 w-16 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="p-6">
                    <div class="flex-col min-w-0 gap-x-4 shadow-lg rounded bg-red-700 m-48 p-4 text-center">
                        <h2 class="text-white flex-auto text-2xl">Fire Safety Tips</h2>
                        <div class="flex flex-wrap justify-center pt-8">
                            <svg class="h-16 w-16 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17.657 18.657A8 8 0 016.343 7.343S7 9 9 10c0-2 .5-5 2.986-7C14 5 16.09 5.777 17.656 7.343A7.975 7.975 0 0120 13a7.975 7.975 0 01-2.343 5.657z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9.879 16.121A3 3 0 1012.015 11L11 14H9c0 .768.293 1.536.879 2.121z" />
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="p-6">
                    <div class="flex-col min-w-0 gap-x-4 shadow-lg rounded bg-red-700 m-48 p-4 text-center">
                        <h2 class="text-white flex-auto text-2xl">First Aid Tips</h2>
                        <div class="flex flex-wrap justify-center pt-8">
                            <svg class="h-16 w-16 text-white" width="24" height="24" viewBox="0 0 24 24"
                                stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" />
                                <path
                                    d="M9 5H7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2V7a2 2 0 0 0 -2 -2h-2" />
                                <rect x="9" y="3" width="6" height="4" rx="2" />
                                <path d="M9 14l2 2l4 -4" />
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="p-6">
                    <div class="flex-col min-w-0 gap-x-4 shadow-lg rounded bg-red-700 m-48 p-4 text-center">
                        <h2 class="text-white flex-auto text-2xl">About BFP</h2>
                        <div class="flex flex-wrap justify-center pt-8">
                            <svg class="h-16 w-16 text-white" width="24" height="24" viewBox="0 0 24 24"
                                stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" />
                                <circle cx="5" cy="17" r="2" />
                                <circle cx="17" cy="17" r="2" />
                                <path d="M7 18h8m4 0h2v-6a5 5 0 0 0 -5 -5h-1l1.5 5h4.5" />
                                <path d="M12 18v-11h3" />
                                <polyline points="3 17 3 12 12 12" />
                                <line x1="3" y1="9" x2="21" y2="3" />
                                <line x1="6" y1="12" x2="6" y2="8" />
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="p-6">
                    <div class="flex-col min-w-0 gap-x-4 shadow-lg rounded bg-red-700 m-48 p-4 text-center">
                        <h2 class="text-white flex-auto text-2xl">Citizen's Charter</h2>
                        <div class="flex flex-wrap justify-center pt-8">
                            <svg class="h-16 w-16 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <line x1="12" y1="20" x2="12" y2="10" />
                                <line x1="18" y1="20" x2="18" y2="4" />
                                <line x1="6" y1="20" x2="6" y2="16" />
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="p-6">
                    <div class="flex-col min-w-0 gap-x-4 shadow-lg rounded bg-red-700 m-48 p-4 text-center">
                        <h2 class="text-white flex-auto text-2xl">Used Vehicle</h2>
                        <div class="flex flex-wrap justify-center pt-8">
                            <svg class="h-16 w-16 text-white" width="24" height="24" viewBox="0 0 24 24"
                                stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" />
                                <circle cx="7" cy="17" r="2" />
                                <circle cx="17" cy="17" r="2" />
                                <path d="M5 17h-2v-6l2-5h9l4 5h1a2 2 0 0 1 2 2v4h-2m-4 0h-6m-6 -6h15m-6 0v-5" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endcan
    </div>
    </div>
</x-app-layout>