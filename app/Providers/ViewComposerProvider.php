<?php

namespace App\Providers;

use App\View\Composers\TeamComposer;
use App\View\Composers\VolunteerComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewComposerProvider extends ServiceProvider
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
        View::composer(['team.edit'],VolunteerComposer::class);

        View::composer(['volunteer.edit'], TeamComposer::class);
    }
}
