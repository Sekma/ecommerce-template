<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;

class ProductController extends Controller
{
    public function index()
    {
        $products = \App\Models\Product::with('images')
            ->latest()
            ->paginate(12);

        return view('front.products.index', [
            'products' => $products,
            'currentCategory' => null,
        ]);
    }

public function category(Category $category)
{
    if ($category->children()->exists()) {

        $categoryIds = $category->children()->pluck('id')->toArray();
        $categoryIds[] = $category->id;

        $products = \App\Models\Product::with('mainImage')
            ->whereIn('category_id', $categoryIds)
            ->latest()
            ->paginate(12);

    } else {

        $products = $category->products()
            ->with('mainImage')
            ->latest()
            ->paginate(12);

    }

    return view('front.products.category', [
        'category' => $category,
        'products' => $products,
        'currentCategory' => $category,
    ]);
}
}