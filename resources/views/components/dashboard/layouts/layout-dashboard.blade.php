<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css" />
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <x-slot:title>{{ $title }}</x-slot:title>

    <!-- choose one -->
    <script src="https://unpkg.com/feather-icons"></script>

    {{-- trix editor --}}
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css">
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>
</head>

<body>
    <div class="antialiased bg-gray-50 dark:bg-gray-900">

        {{-- navbar --}}
        <x-dashboard.layouts.navbar></x-dashboard.layouts.navbar>

        {{-- Sidebar kiri --}}
        <x-dashboard.layouts.sidebar></x-dashboard.layouts.sidebar>


        <main class="h-screen mx-auto md:mx-auto max-w-7xl lg:ms-[250px] px-0 py-6 mt-12 lg:px-1 rounded-lg">

            <x-dashboard.layouts.header>{{ $header }}</x-dashboard.layouts.header>

            <div class="m-5">
                {{ $main }}
            </div>
        </main>
    </div>

    <script>
        feather.replace();
    </script>
</body>

</html>
