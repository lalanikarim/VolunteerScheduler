<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ListSelector extends Component
{
    public $left;
    public $right;
    public $idProp;
    public $showProp;
    public $isShowMethod;
    public $size;
    public $addRoute;
    public $removeRoute;

    public $itemsParamName;
    public $addRouteParams;
    public $removeRouteParams;

    public $leftIds;
    public $rightIds;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($left, $right, $idProp, $showProp, $isShowMethod, $addRoute, $removeRoute, $addRouteParams, $removeRouteParams, $itemsParamName, $size)
    {
        //
        $this->left = $left;
        $this->right = $right;
        $this->idProp = $idProp;
        $this->showProp = $showProp;
        $this->isShowMethod = $isShowMethod;
        $this->addRoute = $addRoute;
        $this->removeRoute = $removeRoute;
        $this->size = $size;
        $this->itemsParamName = $itemsParamName;
        $this->addRouteParams = $addRouteParams;
        $this->removeRouteParams = $removeRouteParams;

        $this->leftIds = $left->map(function($item){ return $item[$this->idProp];})->toArray();
        $this->rightIds = $right->map(function($item){ return $item[$this->idProp];})->toArray();
    }


    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.list-selector');
    }
}
