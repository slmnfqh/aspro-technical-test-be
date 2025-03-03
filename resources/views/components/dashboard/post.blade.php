<x-dashboard.layouts.layout-dashboard>

    <x-slot:title>{{ $title }}</x-slot:title>
    <x-slot:header>{{ $header }}</x-slot:header> <!-- Mengisi slot "header" -->

    <x-slot:main>
        <div class="py-8 lg:pt-2 bg-white dark:bg-gray-900 antialiased">
            <div class="flex justify-between px-4 mx-auto max-w-screen-xl ">

                <article
                    class="lg:pe-[100px] mx-auto w-full max-w-6xl format format-sm sm:format-base lg:format-lg format-blue dark:format-invert">
                    <header class="mb-4 lg:mb-6 not-format">
                        <a href="/dashboard/posts" class="font-medium text-sm text-blue-500 hover:underline">&laquo; Back
                            to all posts
                        </a>
                        <h1 class="mt-4 text-3xl font-extrabold leading-tight text-gray-900 lg:text-4xl dark:text-white">
                            {{ $post->title }}</h1>
                        <div class=" py-3 flex gap-2 items-center">
                            <a href=""
                                class="bg-yellow-400 p-1.5 rounded-lg text-black hover:bg-yellow-600 flex justify-center items-center">
                                <i data-feather="edit" class="w-5 h-5"></i>
                            </a>
                            <form action="/dashboard/posts/{{ $post->slug }}" method="post" class="inline m-0">
                                @method('delete')
                                @csrf
                                <button
                                    class="bg-red-400 p-1.5 rounded-lg text-black hover:bg-red-600 flex justify-center items-center"
                                    onclick="return confirm('Are you sure?')">
                                    <i data-feather="trash-2" class="w-5 h-5"></i>
                                </button>
                            </form>
                        </div>
                        <address class="flex items-center mb-6 mt-2 not-italic">
                            <div class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white">
                                <div>
                                    <p class="text-base text-gray-500 dark:text-gray-400">
                                        {{ $post->created_at->diffForHumans() }}</p>
                                    <p class="text-base text-gray-500 dark:text-gray-400 mt-1">
                                        <a href="/posts?category={{ $post->category->slug }}">
                                            <span
                                                class="bg-{{ $post->category->color }}-100 text-primary-800 text-xs font-medium inline-flex items-center px-1.5 py-0.5 rounded dark:bg-primary-200 dark:text-primary-800 hover:bg-primary-100">
                                                {{ $post->category->name }}
                                            </span>
                                        </a>
                                    </p>
                                </div>
                            </div>
                        </address>
                    </header>
                    <p class="text-justify ">{!! $post->content !!}</p>
                </article>
            </div>
        </div>
    </x-slot:main>

</x-dashboard.layouts.layout-dashboard>
