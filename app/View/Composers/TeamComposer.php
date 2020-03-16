<?php


namespace App\View\Composers;


use App\Models\Team;
use Illuminate\View\View;

class TeamComposer
{
    public function compose(View $view)
    {
        $teams = Team::all();
        $view->with(compact('teams'));
    }
}
