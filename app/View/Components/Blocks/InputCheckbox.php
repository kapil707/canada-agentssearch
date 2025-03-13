<?php

namespace App\View\Components\Blocks;

use Illuminate\View\Component;

class InputCheckbox extends Component
{
    public $label;
    public $name;
    public $value;
    public $checked;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name,$label,$value='',$checked = false)
    {
        $this->label = $label;
        $this->name = $name;
        $this->value = $value;
        $this->checked = $checked;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.blocks.input-checkbox');
    }
}
