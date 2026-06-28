<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        Product::query()->delete();

        $products = [

            ['Sauvage Dior', 'Homme', 350],
            ['Bleu de Chanel', 'Homme', 420],
            ['Acqua di Gio', 'Homme', 310],
            ['Boss Bottled', 'Homme', 280],
            ['Invictus', 'Homme', 295],

            ['J\'adore Dior', 'Femme', 390],
            ['La Vie Est Belle', 'Femme', 370],
            ['Black Opium', 'Femme', 410],
            ['Good Girl', 'Femme', 360],
            ['Libre YSL', 'Femme', 430],

        ];

        foreach ($products as $index => $data) {

            $category = Category::where('name', $data[1])
                ->whereHas('parent', function ($q) {
                    $q->where('name', 'Parfum');
                })
                ->first();

            Product::create([
                'category_id' => $category->id,
                'name' => $data[0],
                'slug' => Str::slug($data[0]),
                'price' => $data[2],
                'sale_price' => null,
                'stock' => rand(5, 30),
                'sku' => 'SKU-' . str_pad($index + 1, 4, '0', STR_PAD_LEFT),
                'is_active' => true,
                'is_featured' => rand(0, 1),
            ]);
        }
    }
}