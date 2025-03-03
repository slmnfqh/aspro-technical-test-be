<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title> <!-- Mengisi slot "title" -->
    <x-slot:header>{{ $header }}</x-slot:header> <!-- Mengisi slot "header" -->

    <!-- Mengisi untuk Konten utama (untuk $slot) -->
    <x-slot:main>
        <article class="py-8 max-w-screen-md border-b border-gray-300 ">
            <h2 class="mb-1 text-3xl font-bold text-gray-900 hover:underline">
                {{ $post['title'] }}
            </h2>
            <div class="text-base text-gray-500">
                <a href="#">{{ $post->user->name }}</a> | {{ $post->created_at->diff(now()) }}
            </div>
            <p class="my-4 font-light text-justify">{{ $post['content'] }}</p>
            <a href="/posts" class="font-medium text-blue-500 hover:underline">&laquo; Back to posts
            </a>
        </article>
    </x-slot:main>
</x-layout>
