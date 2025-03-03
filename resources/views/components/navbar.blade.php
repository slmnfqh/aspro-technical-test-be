<nav class="bg-gray-800 border-gray-200 dark:bg-gray-900">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-3">
        <!-- Logo -->
        <a href="https://www.youtube.com/@pqhuniverse" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="{{ asset('assets/images/pqh-universe.png') }}" class="w-11 ms-3" alt="pqh-universe" />
        </a>



        <!-- Hamburger Toggle (Tanpa JS, menggunakan peer) -->
        <input type="checkbox" id="menu-toggle" class="peer hidden">
        <label for="menu-toggle"
            class="cursor-pointer lg:hidden flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg hover:bg-gray-100 focus:outline-none dark:bg-gray-900 focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
            <span class="sr-only">Open main menu</span>
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M1 1h15M1 7h15M1 13h15" />
            </svg>
        </label>

        <!-- Navbar Menu (Muncul ketika menu-toggle dicentang) -->
        <div
            class="hidden peer-checked:flex flex-col w-full lg:flex lg:w-auto lg:items-center lg:justify-between lg:flex-row">


            <!-- Search Input (Muncul di md ke bawah dalam dropdown) -->
            {{-- <div class="relative mt-3 lg:hidden">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                </div>
                <input type="text" id="search-navbar"
                    class="block w-full p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Search...">
            </div> --}}


            <!-- Menu Links -->
            <ul
                class="flex flex-col p-4 lg:p-0 mt-4 lg:flex-row lg:space-x-8 lg:mt-0 dark:bg-gray-900 lg:bg-gray-800 lg:text-white items-center space-y-2 lg:space-y-0">
                <li class="w-full lg:w-auto">
                    <x-nav-link href="/" :active="request()->is('/')">Home</x-nav-link>
                </li>
                <li class="w-full lg:w-auto">
                    <x-nav-link href="/projects" :active="request()->is('projects') || request()->is('project/*')">Projects</x-nav-link>
                </li>
                <li class="w-full lg:w-auto">
                    <x-nav-link href="/posts" :active="request()->is('posts') || request()->is('post/*')">Posts</x-nav-link>
                </li>
                <li class="w-full lg:w-auto">
                    <x-nav-link href="/about" :active="request()->is('about')">About</x-nav-link>
                </li>
                {{-- <li class="w-full lg:w-auto">
                    <x-nav-link href="/contact" :active="request()->is('contact')">Contact</x-nav-link>
                </li> --}}
                <li class="lg:hidden">
                    <x-nav-link href="{{ request()->is('login') ? '/register' : '/login' }}" :active="request()->is('login') || request()->is('register')">
                        {{ request()->is('login') ? 'Register' : 'Login' }}
                    </x-nav-link>
                </li>
            </ul>

        </div>
        <div class="hidden lg:flex relative">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                <form>
                    @if (request('category'))
                        <input type="hidden" name="category" value="{{ request('category') }}">
                    @endif
                    @if (request('user'))
                        <input type="hidden" name="user" value="{{ request('user') }}">
                    @endif

                    @auth
                        {{-- <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg> --}}
                        {{-- <input type="search" id="search-navbar"
                            class="block w-full p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Search.." name="search" autocomplete="off"> --}}
                    @else
                    @endauth

                </form>
            </div>
            <div class="flex items-center justify-center gap-4 ">
                <button id="theme-toggle" type="button"
                    class="text-gray-500 dark:text-gray-400 dark:hover:bg-gray-700 focus:outline-none hover:text-white focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 text-sm p-2.5">
                    <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5 me-1" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                    </svg>
                    <svg id="theme-toggle-light-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                            fill-rule="evenodd" clip-rule="evenodd"></path>
                    </svg>
                </button>
                <ul>
                    @auth
                        <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown"
                            class="text-white focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-gray-800 dark:focus:ring-blue-800"
                            type="button">Hi!🖐️, {{ auth()->user()->name }} <svg class="w-2.5 h-2.5 ms-3"
                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m1 1 4 4 4-4" />
                            </svg>
                        </button>

                        <!-- Dropdown menu -->
                        <div id="dropdown"
                            class="z-10 hidden bg-gray-800  divide-y divide-gray-100 rounded-lg shadow-sm w-44 dark:bg-gray-700">
                            <ul class="py-2 text-sm text-white dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                                <li>
                                    <a href="{{ route('dashboard') }}"
                                        class="block px-4 py-2 hover:bg-gray-900 dark:hover:bg-gray-600 dark:hover:text-white">My
                                        Dashboard</a>
                                </li>
                                <li>
                                    <form action="/logout" method="POST"
                                        class="block px-4 py-2 hover:bg-gray-900  dark:hover:bg-gray-600 dark:hover:text-white hover:cursor-pointer">
                                        @csrf
                                        <button type="submit">
                                            Sign out
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    @else
                        <li class="flex items-center flex-row">
                            <x-nav-link href="{{ request()->is('register') ? '/register' : '/login' }}" :active="request()->is('login') || request()->is('register')">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6 text-gray-400 me-1">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15m3 0 3-3m0 0-3-3m3 3H9" />
                                </svg>

                                {{ request()->is('register') ? 'Register' : 'Login' }}
                            </x-nav-link>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </div>
</nav>
