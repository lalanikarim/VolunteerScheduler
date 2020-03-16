<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Form extends Component
{
    public $mode;

    public $routeNew;

    public $routeEdit;

    public $paramsEdit;

    public $method;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($routeNew, $routeEdit, $paramsEdit, $method, $mode)
    {
        //
        $this->routeNew = $routeNew;
        $this->routeEdit = $routeEdit;
        $this->paramsEdit = $paramsEdit;
        $this->method = $method;
        $this->mode = $mode;
    }

    public function isForm()
    {
        return $this->mode == 'new' || $this->mode == 'edit';
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.form');
    }
}
