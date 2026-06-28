<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Str;

class ProductController extends Controller
{
public function index()
{
    $categories = Category::whereNull('parent_id')
        ->with('children')
        ->orderBy('name')
        ->get();

    $products = Product::with([
            'category.parent',
            'mainImage'
        ])
        ->when(request('category'), function ($query) {

            $category = Category::with('children')->find(request('category'));

            if ($category) {

                $ids = [$category->id];

                foreach ($category->children as $child) {
                    $ids[] = $child->id;
                }

                $query->whereIn('category_id', $ids);
            }

        })
        ->latest()
        ->paginate(15)
        ->withQueryString();

    return view('admin.products.index', compact('products', 'categories'));
}

    public function create()
    {
        $categories = Category::whereNull('parent_id')
            ->with('children')
            ->orderBy('name')
            ->get();

        return view('admin.products.create', compact('categories'));
    }

    public function store(StoreProductRequest $request)
    {
        $product = Product::create([
            'category_id'       => $request->category_id,
            'name'              => $request->name,
            'slug'              => Str::slug($request->name),
            'short_description' => $request->short_description,
            'description'       => $request->description,
            'price'             => $request->price,
            'sale_price'        => $request->sale_price,
            'stock'             => $request->stock,
            'sku'               => $request->sku,
            'is_active'         => $request->boolean('is_active'),
            'is_featured'       => $request->boolean('is_featured'),
        ]);

        if ($request->hasFile('image')) {

            $image = $request->file('image');

            $filename = time() . '_' . Str::slug(pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME))
                . '.' . $image->getClientOriginalExtension();

            $image->move(public_path('images/products'), $filename);

            $product->images()->create([
                'path' => 'images/products/' . $filename,
                'sort_order' => 1,
            ]);
        }

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Produit créé avec succès.');
    }

    public function show(Product $product)
    {
        //
    }

    public function edit(Product $product)
    {
        $categories = Category::whereNull('parent_id')
            ->with('children')
            ->orderBy('name')
            ->get();

        return view('admin.products.edit', compact('product', 'categories'));
    }

public function update(StoreProductRequest $request, Product $product)
{
    $product->update([
        'category_id'       => $request->category_id,
        'name'              => $request->name,
        'slug'              => Str::slug($request->name),
        'short_description' => $request->short_description,
        'description'       => $request->description,
        'price'             => $request->price,
        'sale_price'        => $request->sale_price,
        'stock'             => $request->stock,
        'sku'               => $request->sku,
        'is_active'         => $request->boolean('is_active'),
        'is_featured'       => $request->boolean('is_featured'),
    ]);

    if ($request->hasFile('image')) {

        // Supprimer l'ancienne image
        if ($product->mainImage) {

            $oldImage = public_path($product->mainImage->path);

            if (file_exists($oldImage)) {
                unlink($oldImage);
            }

            $product->mainImage->delete();
        }

        // Enregistrer la nouvelle image
        $image = $request->file('image');

        $filename = time() . '_' .
            Str::slug(pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME))
            . '.' . $image->getClientOriginalExtension();

        $image->move(public_path('images/products'), $filename);

        $product->images()->create([
            'path' => 'images/products/' . $filename,
            'sort_order' => 1,
        ]);
    }

    return redirect()
        ->route('admin.products.index')
        ->with('success', 'Produit modifié avec succès.');
}

public function destroy(Product $product)
{
    foreach ($product->images as $image) {

        $file = public_path($image->path);

        if (file_exists($file)) {
            unlink($file);
        }
    }

    $product->delete();

    return redirect()
        ->route('admin.products.index')
        ->with('success', 'Produit supprimé avec succès.');
}
}