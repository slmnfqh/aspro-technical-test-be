<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <x-slot:header>{{ $header }}</x-slot:header>

    <x-slot:main>
        <div class="flex h-screen items-center justify-center">
            <div class="w-[900px] bg-white shadow  sm:max-w-md xl:p-0 dark:border-gray-700">
                <div class="p-6 space-y-4 rounded-lg border md:space-y-6 sm:p-8 dark:bg-gray-800">
                    <h1
                        class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white ">
                        Create an account
                    </h1>

                    <form class="space-y-4 md:space-y-6" action="{{ route('store') }}" method="POST">
                        @csrf
                        @foreach (['name', 'username', 'email', 'password'] as $field)
                            <div>
                                <div class="relative">
                                    <input type="{{ $field === 'password' ? 'password' : 'text' }}"
                                        name="{{ $field }}" id="{{ $field }}"
                                        class="block px-2.5 pb-2.5 pt-4 w-full text-sm bg-transparent rounded-lg border-1 peer appearance-none dark:text-gray-300 focus:outline-none focus:ring-0
                                        @error($field) border-red-600 dark:border-red-500 dark:focus:border-red-500 focus:border-red-600
                                        @else  @enderror"
                                        placeholder=" " value="{{ old($field) }}" autofocus />
                                    <label for="{{ $field }}"
                                        class="focus:outline-none dark:text-gray-300 absolute text-sm duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 start-1
                                        @error($field)   @else @enderror">
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
                            Create an account
                        </button>

                        <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                            Already have an account?
                            <a href="/login"
                                class="font-medium text-primary-600 hover:underline dark:text-primary-500">
                                Sign in here
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
                                window.location.href = "{{ route('login') }}";
                            });
                        </script>
                    @endif

                </div>
            </div>
        </div>
    </x-slot:main>
</x-layout>
