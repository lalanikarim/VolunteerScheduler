<?php


namespace App\View\Composers;


use App\Models\Volunteer;
use Illuminate\View\View;

class VolunteerComposer
{
    public function compose(View $view)
    {
        $volunteers = Volunteer::all();
        $view->with(compact('volunteers'));
    }
}
