<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        View::composer('*', function ($view) {

            $view->with(
                'categories',

                Category::whereNull('parent_id')
                    ->with([
                        'children' => function ($query) {
                            $query->orderBy('sort_order');
                        }
                    ])
                    ->orderBy('sort_order')
                    ->get()

            );

        });
    }
}