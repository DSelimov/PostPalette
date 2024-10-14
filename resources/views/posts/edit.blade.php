@extends('layouts.app')

@section('content')
    <div class="container mx-auto py-12">
        <h1 class="text-4xl font-bold text-gray-800 dark:text-gray-100 mb-6">Edit Post</h1>

        <!-- The form submits data to the 'posts.update' route -->
        <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data" class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-8">
            @csrf
            @method('PUT') <!-- Since HTML forms don't support PUT, use @method('PUT') -->

            <!-- Input field for the title, pre-filled with the existing title -->
            <div class="mb-6">
                <label for="title" class="block text-gray-700 dark:text-gray-300 text-sm font-semibold mb-2">Title:</label>
                <input type="text" name="title" id="title" value="{{ $post->title }}" required class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring focus:ring-blue-500">
            </div>

            <!-- Textarea for the content, pre-filled with the existing content -->
            <div class="mb-6">
                <label for="content" class="block text-gray-700 dark:text-gray-300 text-sm font-semibold mb-2">Content:</label>
                <textarea name="content" id="content" required class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring focus:ring-blue-500">{{ $post->content }}</textarea>
            </div>

            <!-- Image upload field -->
            <div class="mb-6">
                <label for="image" class="block text-gray-700 dark:text-gray-300 text-sm font-semibold mb-2">Image:</label>
                <input type="file" name="image" id="image" class="border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring focus:ring-blue-500">
                @if ($post->image_path)
                    <div class="mt-2">
                        <img src="{{ asset('storage/' . $post->image_path) }}" alt="{{ $post->title }}" class="h-40 rounded-lg mt-2">
                    </div>
                @endif
            </div>

            <!-- Submit button to update the post -->
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-lg shadow-lg transition duration-200 transform hover:scale-105">
                Update Post
            </button>
        </form>

        <!-- Link to go back to the list of posts -->
        <div class="mt-6">
            <a href="{{ route('posts.index') }}" class="text-blue-500 hover:text-blue-700 font-semibold">
                &larr; Back to Posts
            </a>
        </div>
    </div>
@endsection
