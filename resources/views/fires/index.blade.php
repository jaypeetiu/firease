<x-app-layout>
    <x-slot name="header">
        {{ __('Fire Records') }}
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
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        ID
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Time Sent
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Type
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Address
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Arrival
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Time Fire End
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($fires as $fire)
                <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$fire->id}}
                    </th>
                    <td class="px-6 py-4">
                        {{$fire->users->name}}
                    </td>
                    <td class="px-6 py-4">
                        {{$fire->time}}
                    </td>
                    <td class="px-6 py-4">
                        {{$fire->type}}
                    </td>
                    <td class="px-6 py-4">
                        {{$fire->address}}
                    </td>
                    <td class="px-6 py-4">
                        {{$fire->arrival}}
                    </td>
                    <td class="px-6 py-4">
                        {{$fire->fire_end}}
                    </td>
                    <td class="px-6 py-4">
                        <a href="#edit" class="font-medium text-blue-600 dark:text-blue-500 hover:underline" onclick="showModal()">Edit</a>
                    </td>
                </tr>
                <!-- Main modal -->
                <div id="defaultModal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative w-full max-w-2xl max-h-full">
                        <form method="post" action="{{ route('fires.update', $fire->id) }}" autocomplete="off">
                            @csrf
                            <!-- Modal content -->
                            <div class="relative bg-white rounded-lg shadow bg-gray-700 shadow-2xl">
                                <!-- Modal header -->
                                <div class="flex items-start justify-between p-4 border-b rounded-t border-gray-600">
                                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                        Edit
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
                                    <x-label for="arrival" :value="__('Arrival')" class="text-white" />
                                    <x-input type="time" name="arrival" id="arrival" value="{{ old('arrival', isset($fire) ? $fire->arrival : '') }}" required autofocus />

                                    <x-label for="fire_end" :value="__('Time Fire End')" class="text-white" />
                                    <x-input type="time" name="fire_end" id="fire_end" value="{{ old('fire_end', isset($fire) ? $fire->fire_end : '') }}" required autofocus />
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
                @endforeach
            </tbody>
        </table>
    </div>
    <script type="text/javascript">
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

</x-app-layout>