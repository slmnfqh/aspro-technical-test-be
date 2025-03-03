@props(['post', 'categories'])
<!-- Modal toggle -->
<div
    class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
    <button id="defaultModalButtonEdit{{ $post->id }}" data-modal-target="defaultModalEdit{{ $post->id }}"
        data-modal-toggle="defaultModalEdit{{ $post->id }}"
        class="flex items-center justify-center text-black bg-yellow-400 hover:bg-yellow-600 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm p-1.5"
        type="button">
        <div class="flex flex-row items-center gap-1">
            <i data-feather="edit" class="w-5 h-5"></i>
        </div>
    </button>
</div>

<!-- Main modal -->
<div id="defaultModalEdit{{ $post->id }}" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-5 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
    <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
        <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
            <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Edit Post
                </h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5"
                    data-modal-toggle="defaultModalEdit{{ $post->id }}">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>

            <form action="/dashboard/posts/{{ $post->slug }}" method="POST" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="overflow-y-auto max-h-96 grid gap-4 mb-4 sm:grid-cols-2">
                    <div>
                        <label for="title" class="block mb-2 text-sm font-medium text-gray-900">Title</label>
                        <input type="text" name="title" id="title{{ $post->id }}"
                            value="{{ old('title', $post->title) }}"
                            class="text-black bg-gray-50 border border-gray-300 text-sm rounded-lg w-full p-2.5">
                    </div>
                    <div>
                        <label for="category" class="block mb-2 text-sm font-medium text-gray-900">Category</label>
                        <select name="category_id"
                            class="bg-gray-50 border border-gray-300 text-sm rounded-lg w-full p-2.5 text-black">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}
                                    name="category_id">
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="sm:col-span-2">
                        <label for="content" class="block mb-2 text-sm font-medium text-gray-900">Post
                            Content</label>
                        <input id="content{{ $post->id }}" type="hidden" name="content"
                            value="{{ old('content', $post->content) }}">
                        <trix-editor input="content{{ $post->id }}"
                            class="block p-2.5 w-full text-sm text-black"></trix-editor>
                    </div>
                </div>
                <button type="submit" class="bg-primary-700 text-white px-5 py-2.5 rounded-lg">
                    Update Post
                </button>
            </form>
        </div>
    </div>
</div>
