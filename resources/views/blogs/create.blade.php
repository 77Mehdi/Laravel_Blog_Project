


<x-app-layout >
    <x-slot name="header">
        <h1 class="font-semibold text-3xl text-gray-300 leading-tight">
            {{ __('Create Your Blog') }}
        </h1>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <h1 class="text-3xl font-bold mb-6"></h1>
                    <div class="max-w-md mx-auto">
                        <form action="{{ route('home.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-4">
                                <label for="title" class="block text-gray-700 font-bold mb-2">Article Title</label>
                                <input type="text" id="title" name="title" placeholder="Article Title" value="{{ old('title') }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500">
                                <div class="error text-red-500 mt-1">
                                    @error('title')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-4">
                                <label for="description" class="block text-gray-700 font-bold mb-2">Description for Your Article</label>
                                <textarea id="description" name="description" value="{{ old('description') }}" placeholder="Description for Your Article" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500">{{ old('description') }}</textarea>
                                <div class="error text-red-500 mt-1">
                                    @error('description')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-4">
                                <label for="image_path" class="block text-gray-700 font-bold mb-2">Image for Your Article</label>
                                <input type="file" id="image_path" name="image_path" class="w-full px-3 py-2 border bg-gray-100 text-gray-500 hover:bg-gray-300 hover:text-gray-700 rounded-md  font-medium transition duration-300">
                                <div class="error text-red-500 mt-1">
                                    @error('image_path')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <button type="submit" class="w-full  bg-green-600 text-gray-200 hover:bg-green-300 hover:text-gray-700 px-4 py-2 rounded-md  font-medium transition duration-300">Submit  the post</button>
                        </form>
                    </div>
                    

                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<x-footer />
