<?php

namespace App\View\Components\Blocks;

use Illuminate\View\Component;

class InputField extends Component
{
    public $label;
    public $name;
    public $required;
    public $type;
    public $value;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name,$required = FALSE,$type = 'text',$value='',$label = '')
    {
        $this->label = $label;
        $this->name = $name;
        $this->required = $required;
        $this->type = $type;
        $this->value = $value;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.blocks.input-field');
    }
}
