<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
 public function index()
{
    $parents = Category::whereNull('parent_id')
        ->with(['children' => function ($query) {
            $query->orderBy('sort_order')
                  ->orderBy('name');
        }])
        ->orderBy('sort_order')
        ->orderBy('name')
        ->get();

    return view('admin.categories.index', compact('parents'));
}

    public function create()
{
    $parents = Category::whereNull('parent_id')
        ->orderBy('name')
        ->get();

    return view('admin.categories.create', compact('parents'));
}

public function store(StoreCategoryRequest $request)
{
    $slug = Str::slug($request->name);

    if ($request->parent_id) {

        $parent = Category::find($request->parent_id);

        $slug = $parent->slug . '-' . $slug;
    }

    Category::create([
        'parent_id' => $request->parent_id,
        'name' => $request->name,
        'slug' => $slug,
        'is_active' => $request->boolean('is_active'),
    ]);

    return redirect()
        ->route('admin.categories.index')
        ->with('success', 'Catégorie créée avec succès.');
}

public function edit(Category $category)
{
    $parents = Category::whereNull('parent_id')
        ->where('id', '!=', $category->id)
        ->orderBy('name')
        ->get();

    return view('admin.categories.edit', compact('category', 'parents'));
}

public function update(StoreCategoryRequest $request, Category $category)
{
    $slug = Str::slug($request->name);

    if ($request->parent_id) {

        $parent = Category::find($request->parent_id);

        $slug = $parent->slug . '-' . $slug;
    }

    $category->update([
        'parent_id' => $request->parent_id,
        'name' => $request->name,
        'slug' => $slug,
        'is_active' => $request->boolean('is_active'),
    ]);

    return redirect()
        ->route('admin.categories.index')
        ->with('success', 'Catégorie modifiée avec succès.');
}
public function destroy(Category $category)
{
    if ($category->children()->exists()) {

        return redirect()
            ->route('admin.categories.index')
            ->with('error', 'Impossible de supprimer une catégorie qui possède des sous-catégories.');

    }

    $category->delete();

    return redirect()
        ->route('admin.categories.index')
        ->with('success', 'Catégorie supprimée avec succès.');
}


}