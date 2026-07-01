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





            Category::create([
            'name' => 'abc1',
            'slug' => Str::slug('abc1'),
            'parent_id' => null,
            'is_active' => true,
        ]);
            Category::create([
            'name' => 'abc2',
            'slug' => Str::slug('abc2'),
            'parent_id' => null,
            'is_active' => true,
        ]);
             Category::create([
            'name' => 'abc3',
            'slug' => Str::slug('abc3'),
            'parent_id' => null,
            'is_active' => true,
        ]);
             Category::create([
            'name' => 'abc4',
            'slug' => Str::slug('abc4'),
            'parent_id' => null,
            'is_active' => true,
        ]);
                    Category::create([
            'name' => 'abc5',
            'slug' => Str::slug('abc5'),
            'parent_id' => null,
            'is_active' => true,
        ]);
            Category::create([
            'name' => 'abc6',
            'slug' => Str::slug('abc6'),
            'parent_id' => null,
            'is_active' => true,
        ]);
             Category::create([
            'name' => 'abc7',
            'slug' => Str::slug('abc7'),
            'parent_id' => null,
            'is_active' => true,
        ]);
             Category::create([
            'name' => 'abc8',
            'slug' => Str::slug('abc8'),
            'parent_id' => null,
            'is_active' => true,
        ]);
                    Category::create([
            'name' => 'abc9',
            'slug' => Str::slug('abc9'),
            'parent_id' => null,
            'is_active' => true,
        ]);
            Category::create([
            'name' => 'abc10',
            'slug' => Str::slug('abc10'),
            'parent_id' => null,
            'is_active' => true,
        ]);
             Category::create([
            'name' => 'abc11',
            'slug' => Str::slug('abc11'),
            'parent_id' => null,
            'is_active' => true,
        ]);
             Category::create([
            'name' => 'abc12',
            'slug' => Str::slug('abc12'),
            'parent_id' => null,
            'is_active' => true,
        ]);

    }
}