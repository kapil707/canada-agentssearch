<?php

namespace App\View\Components\Blocks;

use Illuminate\View\Component;

class IconButton extends Component
{
    public $type;
    public $href;
    public $round;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($href = NULL,$type='button', $round = FALSE)
    {
        $this->href = $href;
        $this->type = $type;
        $this->round = $round;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.blocks.icon-button');
    }
}
