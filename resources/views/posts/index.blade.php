@extends('layouts.app')

@section('content')
    <div class="bg-gray-800 py-20">
        <div class="text-center">
            <h1 class="text-6xl text-white font-bold mb-4">
                Enjoy the Latest Posts
            </h1>
            <p class="text-gray-400 text-lg mb-20 mt-10">
                Explore the latest insights and tips on web development.
            </p>
        </div>
    </div>
    <div class="container mx-auto py-12">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-4xl font-bold text-gray-800 dark:text-gray-100">Posts</h1>
            <a href="{{ route('posts.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-lg shadow-lg transition duration-200 transform hover:scale-105">
                Create New Post
            </a>
        </div>

        @if ($posts->isEmpty())
            <div class="mt-8 p-6 bg-red-100 dark:bg-red-700 text-red-700 dark:text-red-100 rounded-md">
                <p>No posts available. Please create a new post!</p>
            </div>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($posts as $post)
                    <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg overflow-hidden">
                        <div class="flex flex-col">
                            @if ($post->image_path)
                                <img src="{{ asset('storage/' . $post->image_path) }}" alt="{{ $post->title }}" style="width: 100%; height: 200px; object-fit: cover;" class="rounded-t-lg">
                            @endif

                            <div class="p-6 flex-1">
                                <h2 class="text-xl font-semibold text-gray-900 dark:text-gray-200 mb-2">
                                    <a href="{{ route('posts.show', $post->id) }}" class="hover:underline">{{ $post->title }}</a>
                                </h2>
                                <p class="text-gray-600 dark:text-gray-400 mt-2">{{ Str::limit($post->content, 100) }}</p>

                                <div class="mt-4 text-gray-500 dark:text-gray-400">
                                    <p>
                                        <strong>Author:</strong> {{ $post->user->name }}
                                    </p>
                                    <p>
                                        <strong>Created:</strong> {{ $post->created_at->format('M d, Y') }}
                                    </p>
                                    <p>
                                        <strong>Updated:</strong> {{ $post->updated_at->format('M d, Y') }}
                                    </p>
                                </div>

                                <div class="mt-4 flex justify-between items-center">
                                    <a href="{{ route('posts.show', $post->id) }}" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-md transition duration-200 transform hover:scale-105">
                                        Read More
                                    </a>

                                    @if (Auth::user()->id === $post->user_id)
                                        <div class="flex space-x-2">
                                            <a href="{{ route('posts.edit', $post->id) }}" class="bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-4 rounded-md transition duration-200 transform hover:scale-105">
                                                Edit
                                            </a>
                                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this post?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-4 rounded-md transition duration-200 transform hover:scale-105">
                                                    Delete
                                                </button>
                                            </form>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
