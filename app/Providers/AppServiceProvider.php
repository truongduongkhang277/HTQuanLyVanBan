<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // chiều dài mặc định của bảng là 191
        Schema::defaultStringLength(191);
        
        // Để có thể dùng giao diện bootstrap khi phân trang
        Paginator::useBootstrap();
    }
}
