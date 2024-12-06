<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Models\Category;
use App\Models\Font;
use Illuminate\Support\Facades\Log;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
    view()->composer(['site.layouts.header', 'site.layouts.footer', 'site.common'], function ($view) {
        $categories = Category::all();
        $logoFonts = Font::all();

        // Log the data to confirm
        Log::info('Logo Fonts:', $logoFonts->toArray());

        $view->with([
            'categories' => $categories,
            'logoFonts' => $logoFonts
        ]);
    });

    Paginator::useBootstrapFive();
}


}
