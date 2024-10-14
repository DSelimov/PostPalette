@extends('layouts.app')

@section('content')
    <div class="bg-gray-800 py-20">
        <div class="text-center">
            <h1 class="text-6xl text-white font-bold mb-4">
                Create Your Own Post
            </h1>
            <p class="text-gray-400 text-lg mb-10">
                Explore the latest insights and tips on web development.
            </p>
            <a
                href="/posts"
                class="bg-blue-500 text-white py-3 px-6 rounded-full text-lg font-semibold">
                View All Posts
            </a>
        </div>
    </div>

    <div class="container mx-auto px-4 py-10">
        <h1 class="text-4xl font-bold mb-6 text-center">Create New Post</h1>

        <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data" class="bg-white p-8 rounded-lg shadow-lg">
            @csrf

            <div class="mb-6">
                <label for="title" class="block text-gray-700 font-bold mb-2">Title:</label>
                <input type="text" name="title" id="title" required class="border border-gray-300 rounded-lg p-3 w-full focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            </div>

            <div class="mb-6">
                <label for="content" class="block text-gray-700 font-bold mb-2">Content:</label>
                <textarea name="content" id="content" required class="border border-gray-300 rounded-lg p-3 w-full focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" rows="6"></textarea>
            </div>

            <div class="mb-6">
                <label for="image" class="block text-gray-700 font-bold mb-2">Post Image:</label>
                <input type="file" name="image" id="image" accept="image/*" class="border border-gray-300 rounded-lg p-3 w-full focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            </div>

            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-lg transition duration-200 ease-in-out transform hover:scale-105">
                Create Post
            </button>
        </form>
    </div>
@endsection
