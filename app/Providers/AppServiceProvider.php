<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;
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

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        try {
            DB::connection()->getPdo();
            Log::info('Database connected: ' . DB::connection()->getName());
            Log::info('Database connected: ' . DB::connection()->getDatabaseName());
        } catch (\Exception $e) {
            Log::error('Database connection failed: ' . $e->getMessage());
        }

        Model::preventLazyLoading();
    }
}
