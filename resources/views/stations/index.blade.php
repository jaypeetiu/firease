<x-app-layout>
    <x-slot name="header">
        {{ __('Stations') }}
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
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <button type="submit" onclick="showAddModal()"
            class="p-2 pl-6 mb-4 pr-6 bg-red-500 rounded text-white text-sm shadow-lg hover:shadow-red-500/50 hover:duration-700"
            style="float:right;">ADD NEW</button>
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
                        Address
                    </th>
                    <th scope="col" class="px-6 py-3">
                        User
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Status
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Last Login
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$user->id}}
                    </th>
                    <td class="px-6 py-4">
                        Station {{$user->station_id}}
                    </td>
                    <td class="px-6 py-4">
                        {{$user->address}}
                    </td>
                    <td class="px-6 py-4">
                        {{$user->name}}
                    </td>
                    <td class="px-6 py-4">
                        {{$user->active == 1? 'Active': 'Inactive'}}
                    </td>
                    <td class="px-6 py-4">
                        {{$user->last_login_at}}
                    </td>
                    <td class="px-6 py-4">
                        <a href="#edit" class="font-medium text-blue-600 dark:text-blue-500 hover:underline"
                            onclick="showModal('{{$user->id}}', '{{$user->name}}', '{{$user->password}}')">Edit</a>
                        <a href="" class="font-medium text-blue-600 dark:text-blue-500 hover:underline"
                            onclick="deleteUser('{{$user->id}}')">Delete</a>
                    </td>
                </tr>
                <!-- Main modal -->
                <div id="defaultModal" tabindex="-1" aria-hidden="true"
                    class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative w-full max-w-2xl max-h-full">
                        <form method="post" action="{{ route('stations.update', ['id' => '__STATION_ID__']) }}"
                            id="editForm" autocomplete="off">
                            @csrf
                            <!-- Modal content -->
                            <div class="relative bg-white rounded-lg shadow bg-gray-700 shadow-2xl">
                                <!-- Modal header -->
                                <div class="flex items-start justify-between p-4 border-b rounded-t border-gray-600">
                                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                        Edit
                                    </h3>
                                    <button type="button"
                                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                        onclick="closeModal()">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                </div>
                                <!-- Modal body -->
                                <div class="p-6 space-y-6">
                                    <x-label for="name" :value="__('Name')" class="text-white" />
                                    <x-input type="text" name="name" id="name"
                                        value="{{ old('name', isset($user) ? $user->name : '') }}" required autofocus />

                                    <x-label for="password" :value="__('Password')" class="text-white" />
                                    <x-input type="password" name="password" id="password"
                                        value="{{ old('user', isset($user) ? $user->password : '') }}" required
                                        autofocus />
                                </div>
                                <!-- Modal footer -->
                                <div
                                    class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b border-gray-600">
                                    <button type="submit"
                                        class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Submit</button>
                                    <button onclick="closeModal()" type="button"
                                        class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-red-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancel</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Add modal -->
                <div id="addModal" tabindex="-1" aria-hidden="true"
                    class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative w-full max-w-2xl max-h-full">
                        <form method="post" action="{{ route('station.user') }}" autocomplete="off">
                            @csrf
                            <!-- Modal content -->
                            <div class="relative bg-white rounded-lg shadow bg-gray-700 shadow-2xl">
                                <!-- Modal header -->
                                <div class="flex items-start justify-between p-4 border-b rounded-t border-gray-600">
                                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                        Add Station User
                                    </h3>
                                    <button type="button"
                                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                        onclick="closeAddModal()">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                </div>
                                <!-- Modal body -->
                                <div class="p-6 space-y-6">
                                    <x-label for="name" :value="__('Name')" class="text-white" />
                                    <x-input type="text" name="name" id="name" value="{{ old('name') }}" required
                                        autofocus placeholder='John Doe' />

                                    <x-label for="email" :value="__('Email')" class="text-white" />
                                    <x-input type="email" name="email" id="email" value="{{ old('email') }}" required
                                        autofocus placeholder='example@gmail.com' />

                                    <x-label for="password" :value="__('Password')" class="text-white" />
                                    <x-input type="password" name="password" id="password" value="{{ old('password') }}"
                                        required autofocus />

                                    <select name="station" id="station" class="rounded w-full">
                                        <option>
                                            Select Station
                                        </option>
                                        @foreach($stations as $station)
                                        <option value="{{ $station->id }}">
                                            {{$station->address}}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                <!-- Modal footer -->
                                <div
                                    class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b border-gray-600">
                                    <button type="submit"
                                        class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Submit</button>
                                    <button onclick="closeAddModal()" type="button"
                                        class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-red-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancel</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                @endforeach
            </tbody>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript">
        function showModal(id, name, password) {
            console.log(id);
            document.getElementById('defaultModal').style.display = 'block';
            document.getElementById('defaultModal').style.margin = 'auto';
            document.getElementById('defaultModal').style.width = '50%';

            var formAction = "{{ route('stations.update', ['id' => '__STATION_ID__']) }}";
            formAction = formAction.replace('__STATION_ID__', id);
            document.getElementById('editForm').setAttribute('action', formAction);
            document.getElementById('name').setAttribute('value', name);
            document.getElementById('password').setAttribute('value', password);
        }

        function showAddModal() {
            document.getElementById('addModal').style.display = 'block';
            document.getElementById('addModal').style.margin = 'auto';
            document.getElementById('addModal').style.width = '50%';
        }

        function closeModal() {
            document.getElementById('defaultModal').style.display = 'none';
        }

        function closeAddModal() {
            document.getElementById('addModal').style.display = 'none';
        }

        function deleteUser(userId) {
            let text = "Please Confirm to delete user "+userId+"!\nPress Ok or Cancel.";
            if (confirm(text) == true) {
                $.ajax({
                    type: 'DELETE',
                    url: 'user-remove/' + userId,
                    data: {
                        _token: '{{ csrf_token() }}',
                        // Any additional data you want to send
                    },
                    success: function (data) {
                        // Handle the success response, if needed
                        window.location.reload();
                    },
                    error: function (xhr) {
                        // Handle the error response, if needed
                        console.log(xhr);
                    }
                });
            }
        }

    </script>

</x-app-layout>