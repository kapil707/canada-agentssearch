<?php

namespace App\View\Components\Blocks;

use Illuminate\View\Component;

class InputPasswordField extends Component
{
    public $label;
    public $name;
    public $required;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($label,$name,$required = FALSE,$type = 'text')
    {
        $this->label = $label;
        $this->name = $name;
        $this->required = $required;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.blocks.input-password-field');
    }
}
