<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;

class ListProdukController extends Controller
{
    public function show()
    {
        $data = Produk::get();
        foreach ($data as $produk) {
            $id[] = $produk->id;
            $nama[] = $produk->nama;
            $desc[] = $produk->deskripsi;
            $harga[] = $produk->harga;
        }
        return view('pages/list_produk', compact('nama', 'desc', 'harga', 'id'));

    }
    public function simpan(Request $request)
    {
        $produk = new Produk();
        $produk->nama = $request->nama;
        $produk->harga = $request->harga;
        $produk->deskripsi = $request->deskripsi;

        $produk->save();

        return redirect()->back()->with('success', 'Produk berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $produk = Produk::where('id', $id)->first();
        if ($produk) {
            $produk->nama = $request->nama;
            $produk->harga = $request->harga;
            $produk->deskripsi = $request->deskripsi;
            $produk->save();

            return redirect()->back()->with('success', 'Produk berhasil diperbarui!');
        } else {
            return redirect()->back()->with('error', 'Produk tidak ditemukan!');
        }
    }
    public function hapus($id)
    {
        $produk = Produk::where('id', $id)->first();
        if ($produk) {
            $produk->delete();
            return redirect()->back()->with('success', 'Produk berhasil dihapus!');
        } else {
            return redirect()->back()->with('error', 'Produk tidak ditemukan!');
        }
    }
}


