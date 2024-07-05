<?php

namespace App\Http\Controllers;

use App\Models\TodoCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TodoCategoryController extends Controller
{
    /**
     * Display a listing of the todo categories.
     */
    public function index()
    {
        $todoCategories = TodoCategory::where('user_id', Auth::id())->get();
        return view('todocategories.index', compact('todoCategories'));
    }

    /**
     * Show the form for creating a new todo category.
     */
    public function create()
    {
        return view('todocategories.create');
    }

    /**
     * Store a newly created todo category in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required|string|max:255',
        ]);

        TodoCategory::create([
            'user_id' => Auth::id(),
            'category' => $request->category,
        ]);

        return redirect()->route('todocategories.index')->with('success', 'Kategori Catatan berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified todo category.
     */
    public function edit(TodoCategory $todoCategory)
    {
        return view('todocategories.edit', compact('todoCategory'));
    }

    /**
     * Update the specified todo category in storage.
     */
    public function update(Request $request, TodoCategory $todoCategory)
    {
        $request->validate([
            'category' => 'required|string|max:255',
        ]);

        $todoCategory->update([
            'category' => $request->category,
        ]);

        return redirect()->route('todocategories.index')->with('success', 'Kategori Catatan berhasil diperbarui.');
    }

    /**
     * Remove the specified todo category from storage.
     */
    public function destroy(TodoCategory $todoCategory)
    {
        $todoCategory->delete();

        return redirect()->route('todocategories.index')->with('success', 'Kategori Catatan berhasil dihapus.');
    }
}
