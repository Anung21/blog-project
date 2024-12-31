<header class="bg-gray-800 text-white py-4">
    <div class="container mx-auto flex justify-between items-center">
        <h1 class="text-xl font-bold">
            <a href="/" class="hover:underline">Blog Project</a>
        </h1>
        <nav>
            <ul class="flex space-x-4">
                <li><a href="/" class="hover:underline">Home</a></li>
                @auth
                    <li><a href="{{ route('news.create') }}" class="hover:underline">Create News</a></li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <button type="submit" class="hover:underline">
                                Logout
                            </button>
                        </form>
                    </li>
                @else
                    <li><a href="{{ route('login') }}" class="hover:underline">Login</a></li>
                    <li><a href="{{ route('register') }}" class="hover:underline">Register</a></li>
                @endauth
            </ul>
        </nav>
    </div>
</header>
