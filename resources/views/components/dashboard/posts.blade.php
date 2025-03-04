<x-dashboard.layouts.layout-dashboard>

    <x-slot:title>{{ $title }}</x-slot:title>
    <x-slot:header>{{ $header }}</x-slot:header> <!-- Mengisi slot "header" -->

    <x-slot:main>
        {{-- {{ dd($posts) }} --}}
        <!-- Start coding here -->
        <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">

            {{-- tools bar --}}
            <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">

                {{-- add product --}}
                <x-button.posts.button-add :categories="$categories"></x-button.posts.button-add>
            </div>

            <div class="overflow-x-auto lg:px-6">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">

                    <thead class=" text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr clas>
                            <th scope="col" class="px-4 py-3">No</th>
                            <th scope="col" class="px-4 py-3">Product name</th>
                            <th scope="col" class="px-4 py-3">Category</th>
                            <th scope="col" class="px-4 py-3">Content</th>
                            <th scope="col" class="px-4 py-3">Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($posts as $post)
                            <tr
                                class="border-b dark:border-gray-700 {{ $post->deleted_at ? 'bg-gray-300 dark:bg-gray-700' : '' }}">
                                <td class="px-4 py-3 text-black">{{ $loop->iteration }}</td>
                                <th scope="row"
                                    class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    @if ($post->deleted_at)
                                        <del class="text-gray-500">{{ $post->title }}</del>
                                    @else
                                        {{ $post->title }}
                                    @endif
                                </th>
                                <td class="px-4 py-3 text-black">
                                    @if ($post->deleted_at)
                                        <del class="text-gray-500">{{ $post->category->name }}</del>
                                    @else
                                        {{ $post->category->name }}
                                    @endif
                                </td>

                                {{-- menghapus semua tag HTML dari konten sebelum menampilkan hasilnya --}}
                                <td class="px-4 py-3 text-black">
                                    @if ($post->deleted_at)
                                        <del class="text-gray-500"> {!! Str::limit(strip_tags($post->content), 20) !!}</del>
                                    @else
                                        {!! Str::limit(strip_tags($post->content), 20) !!}
                                    @endif
                                </td>

                                <td class="px-4 py-3 flex gap-2 items-center">
                                    @if (!$post->deleted_at)
                                        <a href="/dashboard/posts/{{ $post->slug }}"
                                            class="bg-sky-400 p-1.5 rounded-lg text-black hover:bg-sky-600 flex justify-center items-center">
                                            <i data-feather="eye" class="w-5 h-5"></i>
                                        </a>
                                        <x-button.posts.button-update :post="$post"
                                            :categories="$categories"></x-button.posts.button-update>
                                        <form action="/dashboard/posts/{{ $post->slug }}" method="post"
                                            class="inline m-0">
                                            @method('delete')
                                            @csrf
                                            <button
                                                class="bg-red-400 p-1.5 rounded-lg text-black hover:bg-red-600 flex justify-center items-center"
                                                onclick="return confirm('Are you sure delete?')">
                                                <i data-feather="trash-2" class="w-5 h-5"></i>
                                            </button>
                                        </form>
                                    @endif
                                    @if ($post->deleted_at)
                                        <form action="{{ route('dashboard.posts.restore', $post->id) }}" method="post"
                                            class="inline m-0">
                                            @method('patch')
                                            @csrf
                                            <button
                                                class="bg-green-400 p-1.5 rounded-lg text-black hover:bg-green-600 flex justify-center items-center"
                                                onclick="return confirm('Are you sure restore?')">
                                                <i data-feather="refresh-ccw" class="w-5 h-5"></i>
                                            </button>
                                        </form>
                                    @endif
                                </td>
                            </tr>

                    </tbody>
                    @endforeach
                </table>
            </div>

            {{-- start pagination  --}}
            <nav class="flex flex-col md:flex-row justify-between items-start md:items-center space-y-3 md:space-y-0 p-4"
                aria-label="Table navigation">
                <span class="text-sm font-normal text-gray-500 dark:text-gray-400">
                    Showing
                    <span class="font-semibold text-gray-900 dark:text-white">1-10</span>
                    of
                    <span class="font-semibold text-gray-900 dark:text-white">1000</span>
                </span>
                <ul class="inline-flex items-stretch -space-x-px">
                    <li>
                        <a href="#"
                            class="flex items-center justify-center h-full py-1.5 px-3 ml-0 text-gray-500 bg-white rounded-l-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                            <span class="sr-only">Previous</span>
                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                    clip-rule="evenodd" />
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex items-center justify-center text-sm py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">1</a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex items-center justify-center text-sm py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">2</a>
                    </li>
                    <li>
                        <a href="#" aria-current="page"
                            class="flex items-center justify-center text-sm z-10 py-2 px-3 leading-tight text-primary-600 bg-primary-50 border border-primary-300 hover:bg-primary-100 hover:text-primary-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white">3</a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex items-center justify-center text-sm py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">...</a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex items-center justify-center text-sm py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">100</a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex items-center justify-center h-full py-1.5 px-3 leading-tight text-gray-500 bg-white rounded-r-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                            <span class="sr-only">Next</span>
                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd" />
                            </svg>
                        </a>
                    </li>
                </ul>
            </nav>
            {{-- end pagination  --}}
            @if (session('success'))
                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                <script>
                    Swal.fire({
                        title: "Successful!",
                        text: "{{ session('success') }}",
                        icon: "success",
                        confirmButtonText: "OK"
                    }).then(() => {
                        window.location.href = "/dashboard/posts";
                    });
                </script>
            @endif

        </div>

    </x-slot:main>

</x-dashboard.layouts.layout-dashboard>
