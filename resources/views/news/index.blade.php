<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <h2 class="text-3xl font-bold mb-6 text-gray-900 text-center">{{ $title }}</h2>

    @forelse($news as $item)
        <article class="mb-8 p-6 bg-white rounded-lg shadow-md">
            <!-- Judul dan Konten Berita -->
            <h3 class="text-2xl font-bold text-gray-800">{{ $item->title }}</h3>
            <p class="mt-4 text-gray-600">{{ $item->content }}</p>
            <small class="block mt-2 text-gray-500">
                By: {{ $item->user->name }} | {{ $item->created_at->format('d M Y, H:i') }}
            </small>

            <!-- Komentar -->
            <section class="mt-6">
                <h4 class="text-lg font-semibold text-gray-700 mb-4">Comments:</h4>
                @forelse($item->comments as $comment)
                    <div class="mt-2 border-b pb-2">
                        <p class="text-gray-600">
                            <strong>{{ $comment->user->name }}:</strong> {{ $comment->suggestion }}
                        </p>
                        <small class="text-gray-500">{{ $comment->created_at->format('d M Y, H:i') }}</small>
                    </div>
                @empty
                    <p class="text-gray-500">No comments yet.</p>
                @endforelse
            </section>
        </article>
    @empty
        <p class="text-gray-600 text-center">No news available.</p>
    @endforelse
</x-layout>
