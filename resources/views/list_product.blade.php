@extends('layout.list')

@section('title', 'List Produk')

@section('content')

<div class="relative overflow-x-auto shadow-md sm:rounded-lg mx-auto max-w-md">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    ID
                </th>
                <th scope="col" class="px-6 py-3">
                    Nama Produk
                </th>
                <th scope="col" class="px-6 py-3">
                    Price
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($produk as $post)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                    {{ $post['id'] }}
                </th>
                <td class="px-6 py-4">
                    {{ $post['nama_produk'] }}
                </td>
                <td class="px-6 py-4">
                    {{ $post['harga'] }}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

