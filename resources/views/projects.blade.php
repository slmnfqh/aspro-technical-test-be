<x-layout>
    <x-slot:title>{{ $title ??= 'default' }}</x-slot:title> <!-- Mengisi slot "title" -->
    <x-slot:header>{{ $header ??= 'default' }}</x-slot:header> <!-- Mengisi slot "header" -->

    <!-- Mengisi untuk Konten utama (untuk $slot) -->

    <x-slot:main>
        <div class="flex items-center justify-between ">
            <div class="lg:flex hidden flex-row items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="m5.25 4.5 7.5 7.5-7.5 7.5m6-15 7.5 7.5-7.5 7.5" />
                </svg>
                <p class="font-bold text-[1.5rem] italic">Projects</p>
            </div>


            <div class="flex lg:w-[75%] w-full flex-col lg:flex-row items-center lg:justify-end gap-2">
                {{-- search --}}
                <div class="lg:px-6 lg:w-[75%] w-full">
                    <div class="mx-auto max-w-screen-md sm:text-center">
                        <form action="#">
                            @if (request('category'))
                                <input type="hidden" name="category" id="category" value="{{ request('category') }}">
                            @endif
                            @if (request('user'))
                                <input type="hidden" name="user" id="user" value="{{ request('user') }}">
                            @endif
                            <div class="items-center mx-auto  max-w-screen-sm sm:flex sm:space-y-0">
                                <div class="relative w-full">
                                    <label for="search"
                                        class="hidden  text-sm font-medium text-gray-900 dark:text-gray-300">Search
                                        Project</label>
                                    <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                                d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z" />
                                        </svg>
                                    </div>
                                    <input
                                        class="block pl-10 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:rounded-none sm:rounded-l-lg focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="Search post.." type="search" id="search" name="search"
                                        autocomplete="off">
                                    {{-- name 'search' dikirim utk masuk ke URL --}}
                                </div>
                                <div>
                                    <button type="submit"
                                        class="py-2 px-5 w-full text-sm font-medium text-center text-white rounded-lg border cursor-pointer bg-primary-700 border-primary-600 sm:rounded-none sm:rounded-r-lg hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Search</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                @auth
                    <!-- Jika user sudah login -->
                    <x-button.projects.button-add :categories="$categories"></x-button.projects.button-add>
                @else
                    <!-- Jika user belum login -->

                    <button type="button" onclick="alertLogin()"
                        class="flex items-center gap-1 bg-primary-700 text-white px-2.5 py-2  font-medium rounded-lg text-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                        Add project
                    </button>

                    <script>
                        function alertLogin() {
                            Swal.fire({
                                title: "Peringatan!",
                                text: "Silahkan login terlebih dahulu sebelum menambahkan postingan!",
                                icon: "warning",
                                confirmButtonText: "OK"
                            }).then(() => {
                                window.location.href = "/login";
                            });
                        }
                    </script>
                @endauth
            </div>

            {{-- pagination top --}}
            {{-- <span class="bg-[#1d4ed8] ps-4 rounded-lg">{{ $posts->links() }}</span> --}}

        </div>

        <div class="py-5 px-1 mx-auto max-w-screen-xl lg:py-5 lg:px-0 ">
            <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3 ">

                @forelse ($projects as $project)
                    <article
                        class="p-6 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700  shadow-cyan-500/20">
                        <div class="flex justify-between items-center mb-5 text-gray-500">
                            <a href="/projects?category={{ $project->category->slug }}">
                                <span
                                    class="bg-{{ $project->category->color }}-200 text-primary-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-primary-200 dark:text-primary-800 hover:bg-primary-100">
                                    {{ $project->category->name }}
                                </span>
                            </a>
                            <span class="text-sm">{{ $project->created_at->diffForHumans() }}</span>
                        </div>
                        <img src="{{ $project->image_url }}" alt="gambar" width="500" height="280"
                            class="rounded-md mb-2">
                        <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"><a
                                href="/project/{{ $project->slug }}" class="hover:underline">{{ $project->name }} </a>
                        </h2>
                        <p class="mb-5 font-light text-gray-500 dark:text-gray-400">
                            {!! Str::limit(strip_tags($project->description), 100) !!}
                        </p>
                        <div class="flex justify-between items-center">
                            <a href="/projects?user={{ $project->user->username }}">
                                <div class="flex items-center space-x-4">
                                    <img class="w-7 h-7 rounded-full"
                                        src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/jese-leos.png"
                                        alt="Jese Leos avatar" />
                                    <span class="font-medium text-sm dark:text-white">
                                        {{ Str::limit($project->user->name, 20) }}
                                    </span>
                                </div>
                            </a>
                            <a href="/project/{{ $project['slug'] }}"
                                class="inline-flex items-center font-medium text-primary-600 dark:text-primary-500 hover:underline text-sm">
                                Read more
                                <svg class="ml-2 w-4 h-4" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </a>
                        </div>
                    </article>
                @empty
                    <div>
                        <p class="w-full font-semibold text-xl my-4">
                            Article: '{{ request('search') }}' not found in
                            @if (request('category'))
                                Category: '{{ request('category') }}'
                            @endif
                            @if (request('user'))
                                User: '{{ request('user') }}'
                            @endif
                            !
                        </p>
                        <a href="/project" class="text-blue-600 hover:underline">&laquo; Back to all projects</a>
                    </div>
                @endforelse
            </div>
        </div>

        <div class="flex items-center justify-end ">
            {{-- pagination bottom --}}
            <span class="bg-[#1d4ed8] ps-4 rounded-lg">{{ $projects->links() }}</span>
        </div>
    </x-slot:main>
</x-layout>
