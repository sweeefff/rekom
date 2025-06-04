<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.51.5/dist/full.css" rel="stylesheet" type="text/css" />
    <link href="styles/list_produk.css" rel="stylesheet" type="text/css" />
    <title>Tabel Barang</title>
</head>

<body>
    <div class="flex justify-center items-center flex-col">
        <h1 class="text-center text-3xl font-bold mt-10">Daftar Produk</h1>
        <label for="my_modal_3" class="btn custom-btn-secondary mb-4">Tambah Menu</label>
        <div class="overflow-x-auto rounded-box border bg-white shadow-lg">
            <table class="table w-full">
                @if (session('success'))
                    <div class="alert custom-alert-success shadow-lg mb-4">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span>{{ session('success') }}</span>
                        </div>
                    </div>
                @endif
                @if (session('error'))
                    <div class="alert custom-alert-error shadow-lg mb-4">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10 14l2-2m0-5V5A1 1 0 0115 5v5h-3m-6 0a6 6 0 11-12 0 6 6 0 0112 0z" />
                            </svg>
                            <span>{{ session('error') }}</span>
                        </div>
                    </div>
                @endif
                <thead class="text-xs uppercase">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            <div class="flex items-center">
                                No
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <div class="flex items-center">
                                Nama
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <div class="flex items-center">
                                Deskripsi
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <div class="flex items-center">
                                Harga
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <div class="flex items-center">
                                Aksi
                            </div>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($nama as $index => $produk)
                        <tr class="bg-white border-b animate-fade-in">
                            <td class="px-6 py-4">{{ $index + 1 }}</td>
                            <td class="px-6 py-4 font-medium whitespace-nowrap">{{ $produk }}</td>
                            <td class="px-6 py-4 font-small whitespace-nowrap">{{ $desc[$index] }}</td>
                            <td class="px-6 py-4">Rp. {{ number_format($harga[$index], 0, ',', '.') }}</td>
                            <td class="px-6 py-4">
                                <div class="flex space-x-2">
                                    <button class="p-1 rounded transition-colors edit-button" type="button"
                                        data-id="{{ $id[$index] }}" data-nama="{{ $produk }}"
                                        data-harga="{{ (float) $harga[$index] }}" data-deskripsi="{{ $desc[$index] }}"
                                        data-action="{{ route('produk.update', ['id' => $id[$index]]) }}"
                                        data-modal-target="edit-modal" data-modal-toggle="edit-modal">
                                        <label for="my_modal_2" class="btn btn-sm custom-btn-accent">Edit</label>
                                    </button>
                                    <form method="POST" action="{{ route('produk.hapus', ['id' => $id[$index]]) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-error"
                                            onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?')">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr class="bg-white border-b animate-fade-in">
                            <td colspan="6" class="px-6 py-4 text-center">Tidak ada data tersedia</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <!-- Modal untuk menambah produk -->
            <input type="checkbox" id="my_modal_3" class="modal-toggle" />
            <div class="modal">
                <div class="modal-box bg-white border-2">
                    <label for="my_modal_3" class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</label>
                    <h3 class="text-lg font-bold mb-4">Tambah Produk</h3>
                    <form method="POST" action="{{ route('produk.simpan') }}">
                        @csrf
                        <input type="hidden" name="id" value="">
                        <div class="mb-4">
                            <label class="block text-sm font-bold mb-2" for="nama">
                                Nama Produk
                            </label>
                            <input
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none"
                                id="nama" name="nama" type="text" placeholder="Masukkan nama produk" required>
                        </div>
                        <div class="mb-4">
                            <label class="block text-sm font-bold mb-2" for="harga">
                                Harga
                            </label>
                            <input
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none"
                                id="harga" name="harga" type="number" placeholder="Masukkan harga produk" required>
                        </div>
                        <div class="mb-6">
                            <label class="block text-sm font-bold mb-2" for="deskripsi">
                                Deskripsi
                            </label>
                            <textarea
                                class="border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none"
                                id="deskripsi" name="deskripsi" rows="3"
                                placeholder="Masukkan deskripsi produk"></textarea>
                        </div>

                        <div class="flex items-center justify-between">
                            <button
                                class="btn custom-btn-primary font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline transition-colors"
                                type="submit">
                                Simpan Produk
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- End Modal -->

            <!-- Update Produk Modal -->
            <input type="checkbox" id="my_modal_2" class="modal-toggle" />
            <div class="modal">
                <div class="modal-box bg-white border-2">
                    <label for="my_modal_2" class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</label>
                    <h3 class="text-lg font-bold mb-4">Update Produk</h3>
                    <form method="POST" action="" id="edit-form">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id" id="edit-id" value="">
                        <div class="mb-4">
                            <label class="block text-sm font-bold mb-2" for="edit-nama">
                                Nama Produk
                            </label>
                            <input
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none"
                                id="edit-nama" name="nama" type="text" placeholder="Masukkan nama produk" required>
                        </div>
                        <div class="mb-4">
                            <label class="block text-sm font-bold mb-2" for="edit-harga">
                                Harga
                            </label>
                            <input
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none"
                                id="edit-harga" name="harga" type="number" placeholder="Masukkan harga produk" required>
                        </div>
                        <div class="mb-6">
                            <label class="block text-sm font-bold mb-2" for="edit-deskripsi">
                                Deskripsi
                            </label>
                            <textarea
                                class="border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none"
                                id="edit-deskripsi" name="deskripsi" rows="3"
                                placeholder="Masukkan deskripsi produk"></textarea>
                        </div>

                        <div class="flex items-center justify-between">
                            <button
                                class="btn custom-btn-primary font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline transition-colors"
                                type="submit">
                                Simpan Perubahan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- End Modal -->
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const editButtons = document.querySelectorAll('.edit-button');
            editButtons.forEach(button => {
                button.addEventListener('click', function () {
                    const data = {
                        id: this.dataset.id,
                        nama: this.dataset.nama,
                        harga: this.dataset.harga,
                        deskripsi: this.dataset.deskripsi,
                        action: this.dataset.action
                    };
                    populateEditForm(data);
                });
            });
        });

        function populateEditForm(data) {
            const form = document.getElementById('edit-form');
            form.action = data.action;
            document.getElementById('edit-id').value = data.id;
            document.getElementById('edit-nama').value = data.nama;
            document.getElementById('edit-harga').value = data.harga;
            document.getElementById('edit-deskripsi').value = data.deskripsi;
        }
    </script>
</body>

</html>