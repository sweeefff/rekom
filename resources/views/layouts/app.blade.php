<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield ('title', 'My App')</title>
    <link rel="stylesheet" href="styles/flowbite.min.css">
    <script src="styles/flowbite.min.js"></script>
</head>
<body class="bg-gray-100 text-gray-800 gont-sans">
    @include('components.menu')
    <main class="container mx-auto px-4 mt-10">
        <div class="bg-white shadow-md rounded-lg p-6">
            <h2 class="text-xl fontsemibold mb-4">@yield('page_title', 'Judul Halaman')</h2>
            @yield('content')
        </div>
    </main>

    <footer class="mt-10 text-center text-sm tex-gray-500 py-4 border-t">
        &copy; {{ date('Y') }} Laravel App. All rights reserved.
    </footer>
</html>