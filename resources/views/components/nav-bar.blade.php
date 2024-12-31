<nav class="bg-gray-800">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
            <!-- Logo dan Home -->
            <div class="flex items-center">
                <img class="h-8 w-auto" src="https://tailwindui.com/plus/img/logos/mark.svg?color=indigo&shade=500" alt="Logo">
                <a href="/" class="ml-4 text-white text-sm font-medium hover:underline">Home</a>
            </div>

            <!-- Auth Links -->
            <div class="flex space-x-4">
                @auth
                    @if (Auth::user()->role === 'owner')
                        <!-- Create News (Hanya untuk owner) -->
                        <a href="{{ route('news.create') }}" class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-2 rounded-md text-sm font-medium">
                            Create News
                        </a>
                    @endif

                    <!-- Logout -->
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-3 py-2 rounded-md text-sm font-medium">
                            Logout
                        </button>
                    </form>
                @else
                    <!-- Login -->
                    <a href="{{ route('login') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-2 rounded-md text-sm font-medium">
                        Login
                    </a>

                    <!-- Register -->
                    <a href="{{ route('register') }}" class="bg-green-500 hover:bg-green-600 text-white px-3 py-2 rounded-md text-sm font-medium">
                        Register
                    </a>
                @endauth
            </div>
        </div>
    </div>
</nav>
