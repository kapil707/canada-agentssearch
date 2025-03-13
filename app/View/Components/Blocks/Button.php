<?php

namespace App\View\Components\Blocks;

use Illuminate\View\Component;

class Button extends Component
{
    public $label;
    public $type;
    public $variant;
    public $fullWidth;
    public $href;
    public $formId;
    protected $componentClass = 'focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2';
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($label,$type = 'button', $variant='primary', $fullWidth = FALSE, $href=NULL, $formId = NULL)
    {
        $this->label = $label;
        $this->type = $type;
        $this->variant = $variant;
        $this->fullWidth = $fullWidth;
        $this->href = $href;
        $this->formId = $formId;
        $this->buildClass();
    }


    public function buildClass()
    {
        if($this->fullWidth) {
            $this->componentClass .= ' w-full';
        }
        if($this->variant == 'primary') {
            $this->componentClass .= ' text-white bg-blue-700 hover:bg-blue-800';
        }
        if($this->variant == 'success') {
            $this->componentClass .= ' text-white bg-green-700 hover:bg-green-800';
        }

    }
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.blocks.button', [
            'componentClass' => $this->componentClass
        ]);
    }
}
