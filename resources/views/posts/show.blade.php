@extends('layouts.app')

@section('content')
    <!-- Hero Section -->
    <div class="bg-gray-900 py-20">
        <div class="text-center">
            <h1 class="text-6xl text-white font-bold mb-4">
                Explore The Latest News
            </h1>
            <p class="text-gray-400 text-lg mb-10">
                Discover insights and trends in web development.
            </p>
            <a
                href="/posts"
                class="bg-blue-500 hover:bg-blue-600 text-white py-3 px-6 rounded-full text-lg font-semibold transition duration-200">
                View All Posts
            </a>
        </div>
    </div>

    <!-- Main Content Section -->
    <div class="container mx-auto px-4 py-10">
        <div class="bg-white shadow-lg rounded-lg p-8">
            <h1 class="text-4xl font-bold text-gray-900 mb-6">{{ $post->title }}</h1>
            <p class="text-gray-700 text-lg leading-relaxed">{{ $post->content }}</p>

            <div class="mt-8 flex space-x-6">
                <!-- Link to edit the post -->
                <a href="{{ route('posts.edit', $post->id) }}" class="text-blue-500 hover:text-blue-700 font-semibold text-lg">Edit Post</a>

                <!-- Form to delete the post -->
                <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Are you sure you want to delete this post?');" class="text-red-500 hover:text-red-700 font-semibold text-lg">Delete Post</button>
                </form>
            </div>

            <div class="mt-8">
                <a href="{{ route('posts.index') }}" class="text-gray-500 hover:text-gray-700 font-semibold text-lg">Back to Posts</a>
            </div>
        </div>

        <div class="w-full bg-gray-300 py-10 px-4 mt-16 rounded-lg">
            <div class="max-w-7xl mx-auto">
                <h2 class="text-3xl font-bold text-gray-900 mb-6 text-center">You May Also Like</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach ($randomPosts as $randomPost)
                        <div class="bg-white shadow-lg hover:shadow-xl transition duration-200 rounded-lg overflow-hidden">
                            @if($randomPost->image_path)
                                <!-- Display the post image -->
                                <img src="{{ asset('storage/' . $randomPost->image_path) }}" alt="{{ $randomPost->title }}" class="w-full h-48 object-cover">
                            @endif
                            <div class="p-6">
                                <h3 class="text-2xl font-semibold text-gray-800 mb-3">
                                    <a href="{{ route('posts.show', $randomPost->id) }}" class="hover:text-blue-500">
                                        {{ $randomPost->title }}
                                    </a>
                                </h3>
                                <p class="text-gray-600 text-sm">{{ Str::limit($randomPost->content, 100) }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
