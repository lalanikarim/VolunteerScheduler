<?php

namespace App\Providers;

use App\Models\AppConfig;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class ConfigOverride extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
        if (Schema::hasTable('app_configs'))
        {
            AppConfig::RefreshConfig();
        }
    }
}
