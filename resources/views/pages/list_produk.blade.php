<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/flowbite.min.css">
    <script src="scripts/flowbite.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>

    <title>Tabel Barang</title>
</head>

<body>
    <h1 class="text-center text-3xl font-bold text-red-900 mt-10">Daftar Produk</h1>
    <div class="mx-auto w-11/12 md:w-3/4 lg:w-1/2 px-4 py-6 mt-10 shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-red-500">
            <thead class="text-xs text-red-700 uppercase bg-red-50">
                <tr>
                    <th scope="col" class="px-6 py-3 w-16">
                        <div class="flex items-center">
                            No
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3 w-48">
                        <div class="flex items-center">
                            Nama
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3 min-w-[200px]">
                        <div class="flex items-center">
                            Deskripsi
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3 w-24">
                        <div class="flex items-center">
                            Harga
                        </div>
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($nama as $index => $produk)
                    <tr class="bg-white border-b hover:bg-red-50 animate-fade-in">
                        <td class="px-6 py-4">{{ $index + 1 }}</td>
                        <td class="px-6 py-4 font-medium text-red-900 whitespace-nowrap">{{ $produk }}</td>
                        <td class="px-6 py-4 font-small text-red-900 whitespace-nowrap">{{ $desc[$index] }}
                        </td>
                        <td class="px-6 py-4">{{ $harga[$index] }}</td>
                    </tr>
                @empty
                    <tr class="bg-white border-b hover:bg-red-50 animate-fade-in">
                        <td colspan="6" class="px-6 py-4 text-center text-red-900">Tidak ada data tersedia</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</body>

</html>