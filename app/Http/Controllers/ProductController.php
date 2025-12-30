<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

class ProductController extends Controller
{
    /**
     * Menampilkan daftar produk
     */
    public function index(): View
    {
        // ambil semua produk dari database
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    /**
     * Menampilkan form tambah produk
     */
    public function create(): View
    {
        return view('products.create');
    }

    /**
     * Menyimpan produk baru
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama'      => 'required|string|max:255',
            'harga'     => 'required|numeric',
            'stok'      => 'required|numeric',
            'deskripsi' => 'nullable|string',
            'image'     => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);

        // Simpan file gambar ke storage/app/public/products
        $imagePath = $request->file('image')->store('products', 'public');

        // Simpan data produk ke database
        Product::create([
            'name'        => $request->nama,
            'price'       => $request->harga,
            'stock'       => $request->stok,
            'description' => $request->deskripsi,
            'image'       => $imagePath,
        ]);

        // Redirect ke index dengan pesan sukses
        return redirect()->route('products.index')->with('success', 'Produk berhasil ditambahkan!');
    }

    /**
     * Menampilkan form edit produk
     */
    public function edit(Product $product): View
    {
        return view('products.edit', compact('product'));
    }

    /**
     * Mengupdate produk
     */
    public function update(Request $request, Product $product)
    {
        // Validasi input
        $request->validate([
            'nama'      => 'required|string|max:255',
            'harga'     => 'required|numeric',
            'stok'      => 'required|numeric',
            'deskripsi' => 'nullable|string',
            'image'     => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);

        // Update data produk
        $product->name        = $request->nama;
        $product->price       = $request->harga;
        $product->stock       = $request->stok;
        $product->description = $request->deskripsi;

        // Kalau ada gambar baru diupload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
            $product->image = $imagePath;
        }

        $product->save();

        return redirect()->route('products.index')->with('success', 'Produk berhasil diupdate!');
    }

    /**
     * Menghapus produk
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Produk berhasil dihapus!');
    }
}