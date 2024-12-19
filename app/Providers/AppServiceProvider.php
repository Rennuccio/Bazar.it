<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    public $category_id;
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        Paginator::useBootstrap();
        if(Schema::hasTable('categories')){
            $categories=Category::all();
            View::share('categories', $categories);
        }
        if(Schema::hasTable('subcategories')){
        $subcategories=Subcategory::all();
        View::share('subcategories', $subcategories);
    }
}
}
