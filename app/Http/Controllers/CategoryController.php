<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

class CategoryController extends Controller
{
    // Konstruktor untuk middleware auth
    public function __construct()
    {
        $this->middleware('auth');
    }

    // READ: daftar kategori
    public function index(): View
    {
        $categories = Category::when(request('search'), function($query) {
            $query->where('nama', 'like', '%' . request('search') . '%');
        })->paginate(10);

        return view('category.index', compact('categories'));
    }

    // CREATE: form tambah
    public function create(): View
    {
        return view('category.create');
    }

    // CREATE: simpan data baru
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|min:3|max:255',
        ]);

        Category::create([
            'nama' => $request->nama,
        ]);

        return redirect()->route('category.index')
                         ->with('success', 'Kategori berhasil ditambahkan.');
    }

    // UPDATE: form edit
    public function edit(Category $category): View
    {
        return view('category.edit', compact('category'));
    }

    // UPDATE: simpan perubahan
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'nama' => 'required|string|min:3|max:255',
        ]);

        $category->update([
            'nama' => $request->nama,
        ]);

        return redirect()->route('category.index')
                         ->with('success', 'Kategori berhasil diperbarui.');
    }

    // DELETE: hapus kategori
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('category.index')
                         ->with('success', 'Kategori berhasil dihapus.');
    }
}