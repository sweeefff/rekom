@extends ('layouts.app')

@section('title', 'Home')
@Section ('page_title', 'Selamat Datang di Berita Utama')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Selamat Pagi</h1>
    <p class="mb-4">Berikut adalah berita update di hari ini.</p>
    <div class="flex flex-wrap gap-4">
        @include('components.card', [
            'imgsrc' => 'images/kucing.jpg',
            'title' => 'Kucing',
            'desc' => 'Kucing adalah hewan peliharaan yang lucu dan menggemaskan.'
        ])
        @include('components.card', [
            'imgsrc' => 'images/kucing.jpg',
            'title' => 'Kucing',
            'desc' => 'Kucing adalah hewan peliharaan yang lucu dan menggemaskan.'
        ])
        @include('components.card', [
            'imgsrc' => 'images/kucing.jpg',
            'title' => 'Kucing',
            'desc' => 'Kucing adalah hewan peliharaan yang lucu dan menggemaskan.'
        ])
@endsection