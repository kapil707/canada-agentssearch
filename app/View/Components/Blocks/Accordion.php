<?php

namespace App\View\Components\Blocks;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Accordion extends Component
{
    public $headingId;
    public $title;
    public $bodyId;
    public $bodyClass;
    public $headingClass;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title, $headingId, $bodyId, $bodyClass = '', $headingClass = '')
    {
        $this->title = $title;
        $this->headingId = $headingId;
        $this->bodyId = $bodyId;
        $this->bodyClass = $bodyClass;
        $this->headingClass = $headingClass;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|\Closure|string
     */
    public function render()
    {
        $this->headingClass .= ' flex justify-between items-center py-2 px-5  w-full font-medium text-left text-gray-500 border border-b-0 border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800';
        $this->bodyClass .= ' p-5 border border-b-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900';
        return view('components.blocks.accordion');
    }
}
