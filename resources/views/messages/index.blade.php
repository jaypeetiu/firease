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
                    <input @keydown.enter="@this.call('sendMessage', messageBody) messageBody = ''" x-model="messageBody" class="mr-4 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" placeholder="Message">
                    <button @click="@this.call('sendMessage', messageBody) messageBody = ''" class="btn btn-primary self-stretch">
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
                                <p class="mt-1 truncate text-xs leading-5 text-gray-500">Location: nazareth cagayan de oro</p>
                            </div>
                        </div>
                    </li>
                    <li class="flex justify-between gap-x-6 py-5 shadow-lg bg-gray-100 p-4 mt-4">
                        <div class="flex min-w-0 gap-x-4">
                            <div class="h-12 w-12 flex-none rounded-full bg-green-700"></div>
                            <div class="min-w-0 flex-auto">
                                <p class="text-sm font-semibold leading-6 text-gray-900">Station: Cogon</p>
                                <p class="mt-1 truncate text-xs leading-5 text-gray-500">Location: nazareth cagayan de oro</p>
                            </div>
                        </div>
                    </li>
                    <li class="flex justify-between gap-x-6 py-5 shadow-lg bg-gray-100 p-4 mt-4">
                        <div class="flex min-w-0 gap-x-4">
                            <div class="h-12 w-12 flex-none rounded-full bg-green-700"></div>
                            <div class="min-w-0 flex-auto">
                                <p class="text-sm font-semibold leading-6 text-gray-900">Station: Cogon</p>
                                <p class="mt-1 truncate text-xs leading-5 text-gray-500">Location: nazareth cagayan de oro</p>
                            </div>
                        </div>
                    </li>
                    <li class="flex justify-between gap-x-6 py-5 shadow-lg bg-gray-100 p-4 mt-4">
                        <div class="flex min-w-0 gap-x-4">
                            <div class="h-12 w-12 flex-none rounded-full bg-red-700"></div>
                            <div class="min-w-0 flex-auto">
                                <p class="text-sm font-semibold leading-6 text-gray-900">Station: Cogon</p>
                                <p class="mt-1 truncate text-xs leading-5 text-gray-500">Location: nazareth cagayan de oro</p>
                            </div>
                        </div>
                    </li>
                    <li class="flex justify-between gap-x-6 py-5 shadow-lg bg-gray-100 p-4 mt-4">
                        <div class="flex min-w-0 gap-x-4">
                            <div class="h-12 w-12 flex-none rounded-full bg-green-700"></div>
                            <div class="min-w-0 flex-auto">
                                <p class="text-sm font-semibold leading-6 text-gray-900">Station: Cogon</p>
                                <p class="mt-1 truncate text-xs leading-5 text-gray-500">Location: nazareth cagayan de oro</p>
                            </div>
                        </div>
                    </li>
                    <li class="flex justify-between gap-x-6 py-5 shadow-lg bg-gray-100 p-4 mt-4">
                        <div class="flex min-w-0 gap-x-4">
                            <div class="h-12 w-12 flex-none rounded-full bg-green-700"></div>
                            <div class="min-w-0 flex-auto">
                                <p class="text-sm font-semibold leading-6 text-gray-900">Station: Cogon</p>
                                <p class="mt-1 truncate text-xs leading-5 text-gray-500">Location: nazareth cagayan de oro</p>
                            </div>
                        </div>
                    </li>
                    <li class="flex justify-between gap-x-6 py-5 shadow-lg bg-gray-100 p-4 mt-4">
                        <div class="flex min-w-0 gap-x-4">
                            <div class="h-12 w-12 flex-none rounded-full bg-green-700"></div>
                            <div class="min-w-0 flex-auto">
                                <p class="text-sm font-semibold leading-6 text-gray-900">Station: Cogon</p>
                                <p class="mt-1 truncate text-xs leading-5 text-gray-500">Location: nazareth cagayan de oro</p>
                            </div>
                        </div>
                    </li>
                    <li class="flex justify-between gap-x-6 py-5 shadow-lg bg-gray-100 p-4 mt-4">
                        <div class="flex min-w-0 gap-x-4">
                            <div class="h-12 w-12 flex-none rounded-full bg-green-700"></div>
                            <div class="min-w-0 flex-auto">
                                <p class="text-sm font-semibold leading-6 text-gray-900">Station: Cogon</p>
                                <p class="mt-1 truncate text-xs leading-5 text-gray-500">Location: nazareth cagayan de oro</p>
                            </div>
                        </div>
                    </li>
                    <li class="flex justify-between gap-x-6 py-5 shadow-lg bg-gray-100 p-4 mt-4">
                        <div class="flex min-w-0 gap-x-4">
                            <div class="h-12 w-12 flex-none rounded-full bg-green-700"></div>
                            <div class="min-w-0 flex-auto">
                                <p class="text-sm font-semibold leading-6 text-gray-900">Station: Cogon</p>
                                <p class="mt-1 truncate text-xs leading-5 text-gray-500">Location: nazareth cagayan de oro</p>
                            </div>
                        </div>
                    </li>
                    <li class="flex justify-between gap-x-6 py-5 shadow-lg bg-gray-100 p-4 mt-4">
                        <div class="flex min-w-0 gap-x-4">
                            <div class="h-12 w-12 flex-none rounded-full bg-green-700"></div>
                            <div class="min-w-0 flex-auto">
                                <p class="text-sm font-semibold leading-6 text-gray-900">Station: Cogon</p>
                                <p class="mt-1 truncate text-xs leading-5 text-gray-500">Location: nazareth cagayan de oro</p>
                            </div>
                        </div>
                    </li>
                    <li class="flex justify-between gap-x-6 py-5 shadow-lg bg-gray-100 p-4 mt-4">
                        <div class="flex min-w-0 gap-x-4">
                            <div class="h-12 w-12 flex-none rounded-full bg-green-700"></div>
                            <div class="min-w-0 flex-auto">
                                <p class="text-sm font-semibold leading-6 text-gray-900">Station: Cogon</p>
                                <p class="mt-1 truncate text-xs leading-5 text-gray-500">Location: nazareth cagayan de oro</p>
                            </div>
                        </div>
                    </li>
                    <li class="flex justify-between gap-x-6 py-5 shadow-lg bg-gray-100 p-4 mt-4">
                        <div class="flex min-w-0 gap-x-4">
                            <div class="h-12 w-12 flex-none rounded-full bg-green-700"></div>
                            <div class="min-w-0 flex-auto">
                                <p class="text-sm font-semibold leading-6 text-gray-900">Station: Cogon</p>
                                <p class="mt-1 truncate text-xs leading-5 text-gray-500">Location: nazareth cagayan de oro</p>
                            </div>
                        </div>
                    </li>
                </div>
            </ul>
        </div>
    </div>
    </div>
</x-app-layout>