<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Input extends Component
{

    public $mode;

    public $model;

    public $property;

    public $type;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($type, $model, $name, $mode)
    {
        //
        $this->type = $type;
        $this->model = $model;
        $this->property = $name;
        $this->mode = $mode;
    }

    public function editable()
    {
        return $this->mode != 'show';
    }
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.input');
    }
}
