<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title> <!-- Mengisi slot "title" -->
    <x-slot:header>{{ $header }}</x-slot:header> <!-- Mengisi slot "header" -->

    <!-- Mengisi untuk Konten utama (untuk $slot) -->
    <x-slot:main>

        <div class="pb-16 lg:pb-20 pt-4 bg-white dark:bg-gray-900 antialiased rounded-lg">
            <div class="flex justify-between px-4 mx-auto max-w-screen-xl ">

                <article
                    class="mx-auto w-full max-w-4xl format format-sm sm:format-base lg:format-lg format-blue dark:format-invert">
                    <header class="mb-4 lg:mb-6 not-format">
                        <a href="/projects" class="font-medium text-sm text-blue-500 hover:underline">&laquo; Back to
                            projects
                        </a>
                        <address class="flex items-center my-6 not-italic">
                            <div class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white">
                                <img class="mr-4 w-16 h-16 rounded-full"
                                    src="https://flowbite.com/docs/images/people/profile-picture-2.jpg" alt="Jese Leos">
                                <div>
                                    <a href="/projects?user={{ $project->user->username }}" rel="author"
                                        class="text-xl font-bold text-gray-900 dark:text-white">{{ $project->user->username }}</a>
                                    <p class="text-base text-gray-500 dark:text-gray-400">
                                        {{ $project->created_at->diffForHumans() }}</p>
                                    <p class="text-base text-gray-500 dark:text-gray-400 mt-0.5">
                                        <a href="/projects?category={{ $project->category->slug }}">
                                            <span
                                                class="bg-{{ $project->category->color }}-200 text-primary-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-primary-200 dark:text-primary-800 hover:bg-primary-100">
                                                {{ $project->category->name }}
                                            </span>
                                        </a>
                                    </p>
                                </div>
                            </div>
                        </address>
                        <h1
                            class="mb-4 text-3xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl dark:text-white">
                            {{ $project->name }}</h1>
                    </header>
                    <img src="{{ $project->image_url }}" alt="gambar" width="500" height="280"
                        class="rounded-md">
                    <p class="text-justify">{!! $project->description !!}</p>
                    <div class="flex justify-start gap-3 items-center ">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M6.633 10.25c.806 0 1.533-.446 2.031-1.08a9.041 9.041 0 0 1 2.861-2.4c.723-.384 1.35-.956 1.653-1.715a4.498 4.498 0 0 0 .322-1.672V2.75a.75.75 0 0 1 .75-.75 2.25 2.25 0 0 1 2.25 2.25c0 1.152-.26 2.243-.723 3.218-.266.558.107 1.282.725 1.282m0 0h3.126c1.026 0 1.945.694 2.054 1.715.045.422.068.85.068 1.285a11.95 11.95 0 0 1-2.649 7.521c-.388.482-.987.729-1.605.729H13.48c-.483 0-.964-.078-1.423-.23l-3.114-1.04a4.501 4.501 0 0 0-1.423-.23H5.904m10.598-9.75H14.25M5.904 18.5c.083.205.173.405.27.602.197.4-.078.898-.523.898h-.908c-.889 0-1.713-.518-1.972-1.368a12 12 0 0 1-.521-3.507c0-1.553.295-3.036.831-4.398C3.387 9.953 4.167 9.5 5 9.5h1.053c.472 0 .745.556.5.96a8.958 8.958 0 0 0-1.302 4.665c0 1.194.232 2.333.654 3.375Z" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.25 12.76c0 1.6 1.123 2.994 2.707 3.227 1.068.157 2.148.279 3.238.364.466.037.893.281 1.153.671L12 21l2.652-3.978c.26-.39.687-.634 1.153-.67 1.09-.086 2.17-.208 3.238-.365 1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M7.217 10.907a2.25 2.25 0 1 0 0 2.186m0-2.186c.18.324.283.696.283 1.093s-.103.77-.283 1.093m0-2.186 9.566-5.314m-9.566 7.5 9.566 5.314m0 0a2.25 2.25 0 1 0 3.935 2.186 2.25 2.25 0 0 0-3.935-2.186Zm0-12.814a2.25 2.25 0 1 0 3.933-2.185 2.25 2.25 0 0 0-3.933 2.185Z" />
                        </svg>
                    </div>
                </article>
            </div>
        </div>
    </x-slot:main>
</x-layout>
