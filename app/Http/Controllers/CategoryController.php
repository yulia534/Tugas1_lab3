<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama'      => 'required',
            'deskripsi' => 'nullable',
        ]);

        Category::create([
            'nama'      => $request->nama,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('categories.index')->with('success', 'Kategori berhasil ditambahkan');
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'nama'      => 'required',
            'deskripsi' => 'nullable',
        ]);

        $category->update([
            'nama'      => $request->nama,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('categories.index')->with('success', 'Kategori berhasil diupdate');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Kategori berhasil dihapus');
    }
}