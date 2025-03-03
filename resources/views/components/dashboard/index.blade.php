<x-dashboard.layouts.layout-dashboard>

    <x-slot:title>{{ $title }}</x-slot:title>

    <x-slot:header>{{ $header }}</x-slot:header> <!-- Mengisi slot "header" -->

    <x-slot:main>
        <p class="text-lg">welcome in dashboard🖐️, {{ auth()->user()->name }}</p>
    </x-slot:main>

</x-dashboard.layouts.layout-dashboard>
