<x-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Dashboard
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Selamat Datang -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <p>
                        Selamat datang, <strong>{{ Auth::user()->name }}</strong>! <br>
                        Anda login sebagai: <strong>{{ Auth::user()->role }}</strong>.
                    </p>
                </div>
            </div>

            <!-- Daftar Berita -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-xl font-semibold mb-4">News</h3>

                    @foreach ($news as $item)
                        <div class="mb-6 border-b pb-4">
                            <!-- Judul dan Konten Berita -->
                            <h4 class="text-lg font-bold">{{ $item->title }}</h4>
                            <p class="text-gray-700 dark:text-gray-300">{{ $item->content }}</p>
                            <small class="text-gray-500">
                                By: {{ $item->user->name }} | {{ $item->created_at->format('d M Y, H:i') }}
                            </small>

                            <!-- Komentar -->
                            <div class="mt-4">
                                <h5 class="font-semibold">Comments:</h5>
                                @foreach ($item->comments as $comment)
                                    <div class="mt-2 border-b pb-2">
                                        <p class="text-sm text-gray-600 dark:text-gray-400">
                                            <strong>{{ $comment->user->name }}:</strong> {{ $comment->suggestion }}
                                        </p>
                                        <small class="text-gray-500">
                                            Commented on {{ $comment->created_at->format('d M Y, H:i') }}
                                        </small>
                                    </div>
                                @endforeach
                            </div>

                            <!-- Form Komentar -->
                            @auth
                                <form method="POST" action="{{ route('comments.store', $item) }}" class="mt-4">
                                    @csrf
                                    <textarea name="suggestion" class="w-full p-2 border rounded text-gray-900" rows="2" placeholder="Write your comment..." required></textarea>
                                    <button type="submit" class="mt-2 bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                                        Add Comment
                                    </button>
                                </form>
                            @endauth
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-layout>
