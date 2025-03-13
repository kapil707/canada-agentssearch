<?php

namespace App\View\Components\Layouts;

use Illuminate\View\Component;

class Admin extends Component
{
    public $title;
    public $afterTitleButton;
    public $afterTitleButtonRoute;
    public $afterTitleButtonLabel;
    public $afterTitleButtonType;
    public $afterTitleButtonForm;
    public $breadcrumbs;
    public $afterTitleButtonId;
    public $afterTitleButtonRouteParam;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        $title = NULL,
        $breadcrumbs = FALSE,
        $afterTitleButton = FALSE,
        $afterTitleButtonRoute = NULL,
        $afterTitleButtonLabel = NULL,
        $afterTitleButtonType = 'button',
        $afterTitleButtonForm = NULL,
        $afterTitleButtonId = '',
        $afterTitleButtonRouteParam = NULL
    )
    {
        $this->title = $title;
        $this->breadcrumbs = $breadcrumbs;
        $this->afterTitleButton = $afterTitleButton;
        $this->afterTitleButtonRoute = $afterTitleButtonRoute;
        $this->afterTitleButtonLabel = $afterTitleButtonLabel;
        $this->afterTitleButtonType = $afterTitleButtonType;
        $this->afterTitleButtonForm = $afterTitleButtonForm;
        $this->afterTitleButtonId = $afterTitleButtonId;
        $this->afterTitleButtonRouteParam = $afterTitleButtonRouteParam;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('layouts.admin');
    }
}
