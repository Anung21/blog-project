<x-layout>
    <x-slot:title>{{ $news->title }}</x-slot:title>

    <article class="mb-6">
        <h1 class="text-3xl font-bold mb-4">{{ $news->title }}</h1>
        <p class="text-gray-700">{{ $news->content }}</p>
        <small class="text-gray-500">By: {{ $news->user->name }}</small>
    </article>

    <!-- Form untuk komentar -->
    @if (Auth::check())
        <form method="POST" action="{{ route('comments.store', $news) }}" class="mb-6">
            @csrf
            <textarea name="suggestion" placeholder="Write your comment..." class="w-full p-2 border rounded" required></textarea>
            @error('suggestion')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                Add Comment
            </button>
        </form>
    @endif

    <!-- Daftar komentar -->
    <section class="mt-6">
        <h3 class="text-lg font-bold mb-4">Comments:</h3>
        @foreach ($news->comments as $comment)
            <div class="mb-4 border-b pb-2">
                <p><strong>{{ $comment->user->name }}:</strong> {{ $comment->suggestion }}</p>
            </div>
        @endforeach
    </section>
</x-layout>
