<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DataController extends Controller
{
    public function data()
    {
        return view('list_product', [
            'produk' => [
                ['id' => 1, 'nama_produk' => 'Product 1', 'harga' => 100],
                ['id' => 2, 'nama_produk' => 'Product 2', 'harga' => 200],
                ['id' => 3, 'nama_produk' => 'Product 3', 'harga' => 300],
            ],
        ]);
    }
}

