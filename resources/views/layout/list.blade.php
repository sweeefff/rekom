<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/flowbite.min.css">
    <script src="scripts/flowbite.min.js"></script>

    <title>@yield ('title', 'My App')</title>
</head>
<header>
    @include('components.header')
</header>
<body>
    <h1 style="text-align: center;"><strong>List Produk</strong></h1>
    <div class="container">
        <main>
            @yield('content')
        </main>
    </div>
    @include('components.footer')
</body>
</html>
