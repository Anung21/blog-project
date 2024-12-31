<x-layout>
    <x-slot:title>Create News</x-slot:title>

    <h2 class="text-3xl font-bold mb-6 text-gray-900">Create News</h2>

    <form method="POST" action="{{ route('news.store') }}" class="bg-white shadow rounded p-6">
        @csrf
        <div class="mb-4">
            <label for="title" class="block text-gray-700 font-medium">Title</label>
            <input type="text" id="title" name="title" class="mt-2 p-2 w-full border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ old('title') }}" required>
            @error('title')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="content" class="block text-gray-700 font-medium">Content</label>
            <textarea id="content" name="content" class="mt-2 p-2 w-full border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500" rows="5" required>{{ old('content') }}</textarea>
            @error('content')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        <button type="submit" style="background-color: #3b82f6; color: white; font-weight: 600; padding: 10px 20px; border-radius: 5px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);" class="hover:bg-blue-600">
            Create News
        </button>
    </form>
</x-layout>
