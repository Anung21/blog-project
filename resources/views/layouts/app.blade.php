<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Blog Project')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    @if(session('success'))
    <div class="bg-green-500 text-white p-3 rounded mb-4">
        {{ session('success') }}
    </div>
    @endif

    <!-- Header -->
    @include('partials.header')

    <!-- Main Content -->
    <main class="container mx-auto py-4">
        @yield('content')
    </main>

    <!-- Footer -->
    @include('partials.footer')
</body>
</html>
