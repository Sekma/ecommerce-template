<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        Category::query()->delete();

        $parfum = Category::create([
            'name' => 'Parfum',
            'slug' => Str::slug('Parfum'),
            'parent_id' => null,
            'is_active' => true,
        ]);

        Category::create([
            'name' => 'Homme',
            'slug' => 'homme-parfum',
            'parent_id' => $parfum->id,
            'is_active' => true,
        ]);

        Category::create([
            'name' => 'Femme',
            'slug' => 'femme-parfum',
            'parent_id' => $parfum->id,
            'is_active' => true,
        ]);

        $gel = Category::create([
            'name' => 'Gel Douche',
            'slug' => Str::slug('Gel Douche'),
            'parent_id' => null,
            'is_active' => true,
        ]);

        Category::create([
            'name' => 'Homme',
            'slug' => 'homme-gel',
            'parent_id' => $gel->id,
            'is_active' => true,
        ]);

        Category::create([
            'name' => 'Femme',
            'slug' => 'femme-gel',
            'parent_id' => $gel->id,
            'is_active' => true,
        ]);
    }
}