<?php

namespace App\View\Components\Blocks;

use Illuminate\View\Component;

class PageHeader extends Component
{
    public $title;
    public $breadcrumbs;
    public $noBreadcrumbs;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title, $breadcrumbs = [], $noBreadcrumbs = FALSE)
    {
        $this->title = $title;
        $this->breadcrumbs = $breadcrumbs;
        $this->noBreadcrumbs = $noBreadcrumbs;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.blocks.page-header');
    }
}
