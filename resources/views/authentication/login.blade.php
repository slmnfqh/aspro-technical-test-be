<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <x-slot:header>{{ $header }}</x-slot:header>

    <x-slot:main>
        <div class="flex h-screen items-center justify-center ">
            <div class="w-[900px] bg-white rounded-lg shadow sm:max-w-md xl:p-0 dark:border-gray-700">
                <div class="p-6 space-y-4 md:space-y-6 rounded-lg border sm:p-8 dark:bg-gray-800">
                    <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                        Sign in to your account
                    </h1>

                    <form class="space-y-4 md:space-y-6" action="{{ route('authenticate') }}" method="POST">
                        @csrf
                        @foreach (['email', 'password'] as $field)
                            <div>
                                <div class="relative">
                                    <input type="{{ $field === 'password' ? 'password' : 'text' }}"
                                        name="{{ $field }}" id="{{ $field }}"
                                        class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 peer appearance-none focus:outline-none focus:ring-0 dark:text-white
                                        @error($field) border-red-600 dark:border-red-500 dark:focus:border-red-500 focus:border-red-600
                                        @else  @enderror"
                                        placeholder=" " value="{{ old($field) }}" autofocus />
                                    <label for="{{ $field }}"
                                        class="absolute text-sm duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2  dark:text-gray-300 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 start-1
                                        @error($field) text-red-600  @else @enderror">
                                        {{ $field }}
                                    </label>
                                </div>
                                @error($field)
                                    <p class="mt-2 text-xs text-red-600 dark:text-red-400">
                                        <span class="font-medium">Upss..!</span> {{ $message }}
                                    </p>
                                @enderror
                            </div>
                        @endforeach

                        <button type="submit"
                            class="w-full text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                            Sign in to your account
                        </button>

                        <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                            Don’t have an account yet?
                            <a href="/register"
                                class="font-medium text-primary-600 hover:underline dark:text-primary-500">
                                Sign up
                            </a>
                        </p>
                    </form>
                    @if (session('success'))
                        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                        <script>
                            Swal.fire({
                                title: "Registration Successful!",
                                text: "{{ session('success') }}",
                                icon: "success",
                                confirmButtonText: "OK"
                            }).then(() => {
                                window.location.href = "{{ route('dashboard') }}";
                            });
                        </script>
                    @elseif (session('error'))
                        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                        <script>
                            Swal.fire({
                                icon: "error",
                                title: "Oops...",
                                text: "{{ session('error') }}",
                            });
                        </script>
                    @endif


                </div>
            </div>
        </div>
    </x-slot:main>
</x-layout>
