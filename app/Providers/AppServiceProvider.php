<?php

namespace App\Providers;

use App\Models\News;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
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
        Paginator::useBootstrapFive();

        View::composer([
            'welcome',
            'sejarah',
            'vision-mission',
            'majors.*',
        ], function ($view): void {
            $latestNews = News::with('author')
                ->published()
                ->orderByDesc('published_at')
                ->orderByDesc('id')
                ->take(4)
                ->get();

            $view->with('latestNews', $latestNews);
        });
    }
}
