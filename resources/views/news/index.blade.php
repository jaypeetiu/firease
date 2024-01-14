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
                <h2 class="text-2xl font-bold mb-4">BREAKING NEWS</h2>
                @if($breakingNews!=null)
                <div class="mb-4">
                    <img src="{{$breakingNews->image}}" alt="{{$breakingNews->title}}" class="w-full h-auto rounded-md">
                </div>

                <div class="mb-4">
                    <h3>{{$breakingNews->title}}</h3>
                    <p class="text-gray-700">{{$breakingNews->description}}</p>
                </div>
                <button
                    onclick="showModal('{{$breakingNews->id}}', `{{$breakingNews->title}}`, `{{$breakingNews->description}}`)"
                    class="bg-red-500 text-white px-4 py-2 rounded mt-2">Edit News</button>
                @endif
                <!-- Button to create new news -->
                <!-- <a href="{{route('news.create')}}" class="bg-red-500 text-white px-4 py-2 rounded">Create News</a> -->
            </div>
            <!-- Main modal -->
            <div id="defaultModal" tabindex="-1" aria-hidden="true"
                class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative w-full max-w-2xl max-h-full">
                    <form method="post" action="{{ route('news.update', ['id' => '__NEWS_ID__']) }}" id="editForm"
                        autocomplete="off">
                        @csrf
                        <!-- Modal content -->
                        <div class="relative bg-white rounded-lg shadow bg-gray-700 shadow-2xl">
                            <!-- Modal header -->
                            <div class="flex items-start justify-between p-4 border-b rounded-t border-gray-600">
                                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                    Edit News
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
                                <x-label for="title" :value="__('Name')" class="text-white" />
                                <x-input type="text" name="title" id="title"
                                    value="{{ old('title', isset($breakingNews) ? $breakingNews->title : '') }}"
                                    required autofocus />

                                <x-label for="description" :value="__('Description')" class="text-white" />
                                <x-input type="description" name="description" id="description"
                                    value="{{ old('user', isset($breakingNews) ? $breakingNews->description : '') }}"
                                    required autofocus />
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
        </div>

        <div class="col-span-2">
            <!-- Latest News Section -->
            <div class="bg-white p-4 rounded shadow">
                <h2 class="text-2xl font-bold mb-4">LATEST NEWS</h2>
                <ul class="overflow-y-scroll max-h-screen h-3/4">
                    @foreach($news as $new)
                    <li class="mb-2">
                        <a href="{{route('news.show', $new->id)}}">
                            <img src="{{$new->image}}" alt="Image" class="w-48 h-36 mb-2 mt-4 rounded">
                            <h4 class="text-lg font-semibold">{{ $new->title }}</h4>
                            <p>{{ $new->description }}</p>
                            @can('super_access')
                            <!-- Button to edit news -->
                            <!-- <button onclick="" class="bg-red-500 text-white px-4 py-2 rounded mt-2">Edit News</button> -->
                            @endcan
                        </a>
                    </li>
                    @endforeach
                </ul>
                @can('super_access')
                <!-- Button to create new news -->
                <a href="{{route('news.create')}}" class="bg-red-500 text-white px-4 py-2 rounded">Create News</a>
                @endcan
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript">

        function showModal(id, title, description) {
            console.log(id);
            document.getElementById('defaultModal').style.display = 'block';
            document.getElementById('defaultModal').style.margin = 'auto';
            document.getElementById('defaultModal').style.width = '50%';

            var formAction = "{{ route('news.update', ['id' => '__NEWS_ID__']) }}";
            formAction = formAction.replace('__NEWS_ID__', id);
            document.getElementById('editForm').setAttribute('action', formAction);
            document.getElementById('title').setAttribute('value', title);
            document.getElementById('description').setAttribute('value', description);
        }

        function closeModal() {
            document.getElementById('defaultModal').style.display = 'none';
        }

        function updateNews(newsId) {
            $.ajax({
                type: 'POST',
                url: 'news/' + newsId,
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