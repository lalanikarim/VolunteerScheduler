<?php

namespace App\View\Components;

use Illuminate\View\Component;

class VolunteerTeamRow extends Component
{
    public $team;
    public $teams;
    public $volunteer;
    public $action;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($volunteer, $team, $teams, $action)
    {
        //
        $this->team = $team;
        $this->volunteer = $volunteer;
        $this->action = $action;
        $this->teams = $teams;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.volunteer-team-row');
    }
}
