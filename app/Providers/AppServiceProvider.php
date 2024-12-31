<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Namespace untuk controller.
     *
     * Jika diperlukan untuk mengatur namespace secara eksplisit.
     */
    protected $namespace = 'App\Http\Controllers';

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
        // Mengatur namespace untuk rute jika diperlukan
        Route::namespace($this->namespace)->group(base_path('routes/web.php'));
    }
}
