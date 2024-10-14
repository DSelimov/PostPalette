{{-- resources/views/index.blade.php --}}
@extends('layouts.app')

@section('content')
    <div class="bg-gray-800 py-20">
        <div class="text-center">
            <h1 class="text-6xl text-white font-bold mb-4">
                Welcome to My Blog
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
    <!---->
    <div class="py-20 bg-gray-700">
        <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-10">
            <div class="bg-gray-800 rounded-lg shadow-lg overflow-hidden">
                <img src="https://cdn.pixabay.com/photo/2024/05/22/01/46/room-8779510_1280.png" alt="" class="w-full h-48 object-cover">
                <div class="p-6">
                    <h2 class="text-2xl text-white font-bold mb-2">Web Development Essentials</h2>
                    <p class="text-gray-400 mb-4">
                        Dive into the fundamentals of web development and learn the best practices.
                    </p>
                    <a href="/posts/14" class="text-blue-500 font-bold">Read More</a>
                </div>
            </div>

            <div class="bg-gray-800 rounded-lg shadow-lg overflow-hidden">
                <img src="https://cdn.pixabay.com/photo/2024/04/09/03/04/ai-generated-8684869_1280.jpg" alt="" class="w-full h-48 object-cover">
                <div class="p-6">
                    <h2 class="text-2xl text-white font-bold mb-2">Mastering JavaScript</h2>
                    <p class="text-gray-400 mb-4">
                        Explore advanced JavaScript concepts and enhance your coding skills.
                    </p>
                    <a href="/posts/13" class="text-blue-500 font-bold">Read More</a>
                </div>
            </div>

            <div class="bg-gray-800 rounded-lg shadow-lg overflow-hidden">
                <img src="https://cdn.pixabay.com/photo/2013/07/12/16/35/php-151199_1280.png" alt="" class="w-full h-48 object-cover">
                <div class="p-6">
                    <h2 class="text-2xl text-white font-bold mb-2">Getting Started with PHP</h2>
                    <p class="text-gray-400 mb-4">
                        Learn the basics of PHP programming for dynamic web applications.
                    </p>
                    <a href="/posts/10" class="text-blue-500 font-bold">Read More</a>
                </div>
            </div>
        </div>
    </div>

    <div class="py-20 bg-gray-900 text-center">
        <h2 class="text-4xl text-white font-bold mb-5">Upcoming Workshops</h2>
        <p class="text-gray-400 mb-10">
            Join our workshops to enhance your skills and network with fellow developers.
        </p>
        <div class="max-w-4xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-10">
            <div class="bg-gray-800 rounded-lg p-6">
                <h3 class="text-xl text-white font-bold mb-2">Intro to Web Development</h3>
                <p class="text-gray-400">Learn the fundamentals of building websites.</p>
                <span class="text-gray-500">Date: March 10, 2024</span>
            </div>
            <div class="bg-gray-800 rounded-lg p-6">
                <h3 class="text-xl text-white font-bold mb-2">Advanced PHP Techniques</h3>
                <p class="text-gray-400">Dive deeper into PHP and explore advanced topics.</p>
                <span class="text-gray-500">Date: March 17, 2024</span>
            </div>
        </div>
        <a href="/events" class="mt-5 inline-block bg-blue-500 text-white py-3 px-6 rounded-full font-semibold">View All Workshops</a>
    </div>

    <div class="py-20 bg-gray-700 text-center">
        <h2 class="text-4xl text-white font-bold mb-5">Join Our Community</h2>
        <p class="text-gray-400 mb-10">
            Connect with other developers, share your knowledge, and grow together.
        </p>
        <a href="/community" class="bg-blue-500 text-white py-3 px-6 rounded-full font-semibold">Join Now</a>
    </div>
@endsection
