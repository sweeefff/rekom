<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.51.5/dist/full.css" rel="stylesheet" type="text/css" />
    <title>Tabel Barang</title>
</head>

<body>
    <h1 class="text-center text-3xl font-bold text-primary mt-10">Daftar Produk</h1>
    <div class="mx-auto w-11/12 md:w-3/4 lg:w-1/2 px-4 py-6 mt-10 shadow-md sm:rounded-lg">
        <label for="my_modal_3" class="btn btn-soft btn-secondary">Tambah Menu</label>
        <div class="overflow-x-auto rounded-box border border-base-content/5 bg-base-100">
            <table class="table">
                <thead class="text-xs text-primary uppercase bg-primary/50">
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
                        <tr class="bg-white border-b hover:bg-primary/50 animate-fade-in">
                            <td class="px-6 py-4">{{ $index + 1 }}</td>
                            <td class="px-6 py-4 font-medium text-primary whitespace-nowrap">{{ $produk }}</td>
                            <td class="px-6 py-4 font-small text-primary whitespace-nowrap">{{ $desc[$index] }}
                            </td>
                            <td class="px-6 py-4">Rp. {{ number_format($harga[$index], 0, ',', '.') }}</td>
                        </tr>
                    @empty
                        <tr class="bg-white border-b hover:bg-primary/50 animate-fade-in">
                            <td colspan="6" class="px-6 py-4 text-center text-primary">Tidak ada data tersedia</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <input type="checkbox" id="my_modal_3" class="modal-toggle" />
            <div class="modal">
                <div class="modal-box">
                    <label for="my_modal_3" class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</label>
                    <h3 class="text-lg font-bold">Tambah Produk</h3>
                    <form method="POST" action="{{ route('produk.simpan') }}">
                        @csrf
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="nama">
                                Nama Produk
                            </label>
                            <input
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="nama" name="nama" type="text" placeholder="Masukkan nama produk" required>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="harga">
                                Harga
                            </label>
                            <input
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="harga" name="harga" type="number" placeholder="Masukkan harga produk" required>
                        </div>
                        <div class="mb-6">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="deskripsi">
                                Deskripsi
                            </label>
                            <textarea
                                class="border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="deskripsi" name="deskripsi" rows="3"
                                placeholder="Masukkan deskripsi produk"></textarea>
                        </div>

                        <div class="flex items-center justify-between">
                            <button
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                                type="submit">
                                Simpan Produk
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>