<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? 'Default Title' }}</title>
    @vite('resources/css/app.css')
</head>
<body class="h-full flex flex-col">
    <div class="flex-grow">
        <x-nav-bar />
        <main class="container mx-auto py-6">
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">

            {{ $slot }}
            </div>
        </main>
    </div>
    <x-footer />
</body>
</html>
