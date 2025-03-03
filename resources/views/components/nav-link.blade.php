<a {{ $attributes }}
    class="{{ $active ? 'bg-gray-900   font-medium text-white text-sm sm:w-full lg:py-2 lg:px-3 py-2 px-3 flex items-center justify-center rounded-md' : 'text-gray-400 hover:bg-gray-700 hover:text-white w-full lg:py-2 lg:px-3 md:hover:bg-gray-700 text-sm  rounded-md flex items-center justify-center py-2 px-3' }}"
    aria-current="{{ $active ? 'page' : false }}">
    {{ $slot }}
</a>
