<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title> <!-- Mengisi slot "title" -->

    <!-- Mengisi untuk Konten utama (untuk $slot) -->
    <x-slot:main>
        <div class="flex flex-col items-center justify-center py-16 lg:py-10 dark:bg-gray-900 rounded-lg">
            <div class="mx-auto max-w-4xl py-5 sm:py-24 lg:py-5 lg:px-8">
                <div class="hidden sm:mb-8 sm:flex sm:justify-center">
                    <div
                        class="relative rounded-full px-3 py-1 text-sm/6 dark:bg-gray-800 text-gray-600 dark:text-gray-300 ring-1 ring-gray-900/10 hover:ring-gray-900/20">
                        Announcing our next round of funding. <a href="#"
                            class="font-semibold text-indigo-600"><span class="absolute inset-0"
                                aria-hidden="true"></span>Read more <span aria-hidden="true">&rarr;</span></a>
                    </div>
                </div>
                <div class="text-center">
                    <h1
                        class="dark:text-gray-300 text-5xl font-semibold tracking-tight text-balance text-gray-900 sm:text-7xl">
                        Data to
                        enrich your online business</h1>
                    <p class="mt-8 text-lg font-medium text-pretty dark:text-gray-300 text-gray-500 sm:text-xl/8">Anim
                        aute id magna
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus laudantium quidem sint
                        laborum, quos modi rem totam, obcaecati itaque ipsum perferendis! Magnam dicta deserunt in, odit
                        architecto dolores corporis laboriosam.</p>
                    <div class="my-10 flex items-center justify-center gap-x-6">
                        <a href="/login"
                            class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Get
                            started</a>
                        <a href="#"
                            class="hover:underline dark:text-gray-300 text-sm/6 font-semibold text-gray-900">Learn more
                            <span aria-hidden="true">→</span></a>
                    </div>
                </div>
            </div>
            <div class="absolute inset-x-0 top-[calc(100%-13rem)] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[calc(100%-30rem)]"
                aria-hidden="true">
                <div class="relative left-[calc(50%+3rem)] aspect-1155/678 w-[36.125rem] -translate-x-1/2 bg-linear-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%+36rem)] sm:w-[72.1875rem]"
                    style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)">
                </div>
            </div>
        </div>
    </x-slot:main>
</x-layout>
