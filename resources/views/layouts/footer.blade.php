<footer class="bg-gray-800 text-white py-10">
    <div class="container mx-auto px-4">
        <div class="flex flex-col md:flex-row justify-between items-start">
            <!-- About Section -->
            <div class="mb-6 md:mb-0">
                <h3 class="text-xl font-semibold">About My Blog</h3>
                <p class="text-gray-400">
                    <br>
                    Programming <br><br>
                    Development <br><br>
                    Latest News
                </p>
            </div>

            <!-- Navigation Links -->
            <div class="mb-6 md:mb-0">
                <h3 class="text-xl font-semibold">Quick Links</h3>
                <ul class="text-gray-400 space-y-2">
                    <li><a href="/" class="hover:text-white">Home</a></li>
                    <li><a href="/posts" class="hover:text-white">Posts</a></li>
                </ul>
            </div>

            <!-- Social Media Links -->
            <div class="mb-6 md:mb-0">
                <h3 class="text-xl font-semibold">Follow Us</h3>
                <div class="flex space-x-4">
                    <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>

            <!-- Newsletter Subscription Form -->
            <div>
                <h3 class="text-xl font-semibold">Subscribe to our Newsletter</h3>
                <form action="#" method="POST" class="mt-2">
                    <input type="email" placeholder="Your email" class="px-4 py-2 rounded-l-md focus:outline-none" required>
                    <button type="submit" class="bg-blue-600 px-4 py-2 rounded-r-md hover:bg-blue-700 focus:outline-none">Subscribe</button>
                </form>
            </div>
        </div>

        <div class="border-t border-gray-700 mt-6 pt-6 text-center">
            <p class="text-gray-400">© {{ date('Y') }} Dincher Selimov. All rights reserved.</p>
        </div>
    </div>
</footer>
