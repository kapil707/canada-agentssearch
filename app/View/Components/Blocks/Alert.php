<?php

namespace App\View\Components\Blocks;

use Illuminate\View\Component;

class Alert extends Component
{
    protected $componentClass = 'p-4 mb-4 text-sm rounded-lg';
    public $type;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($type = 'info')
    {
        $this->type = $type;
        if($type == 'info') {
            $this->componentClass .= ' text-blue-700 bg-blue-100 dark:bg-blue-200 dark:text-blue-800';
        } elseif ($type == 'danger') {
            $this->componentClass .= ' text-red-700 bg-red-100 dark:bg-red-200 dark:text-red-800';
        } elseif ($type == 'success') {
            $this->componentClass .= ' text-green-700 bg-green-100 dark:bg-green-200 dark:text-green-800';
        } elseif ($type == 'warning') {
            $this->componentClass .= ' text-yellow-700 bg-yellow-100 dark:bg-yellow-200 dark:text-yellow-800';
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.blocks.alert',[
            'componentClass' => $this->componentClass
        ]);
    }
}
