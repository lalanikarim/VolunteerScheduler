<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Select extends Component
{
    public $property;

    public $items;

    public $idprop;

    public $valueprop;

    public $valueisfunction;

    public $model;

    public $mode;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($property, $items, $idprop, $valueprop, $valueisfunction, $model, $mode)
    {
        //
        $this->property = $property;
        $this->items = $items;
        $this->idprop = $idprop;
        $this->valueprop = $valueprop;
        $this->valueisfunction = $valueisfunction;
        $this->model = $model;
        $this->mode = $mode;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.select');
    }
}
