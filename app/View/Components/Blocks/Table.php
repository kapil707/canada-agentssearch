<?php

namespace App\View\Components\Blocks;

use Illuminate\View\Component;

class Table extends Component
{
    public $striped;
    public $hover;
    public $data;
    public $columns;
    public $route;
    public $rowKey;
    public $hasDelete;
    public $hasEdit;
    public $noLinks;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($striped = FALSE, $hover = FALSE, $columns = [], $data = [], $hasEdit = FALSE, $rowKey = NULL, $hasDelete = FALSE, $route = NULL, $noLinks = FALSE)
    {
        $this->hover = $hover;
        $this->striped = $striped;
        $this->columns = $columns;
        $this->data = $data;
        $this->route = $route;
        $this->rowKey = $rowKey;
        $this->hasDelete = $hasDelete;
        $this->hasEdit = $hasEdit;
        $this->noLinks = $noLinks;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $rowClass = 'bg-white border-b dark:bg-gray-800 dark:border-gray-700';
        if($this->striped) {
            $rowClass = 'border-b dark:bg-gray-800 dark:border-gray-700 odd:bg-white even:bg-gray-100 odd:dark:bg-gray-800 even:dark:bg-gray-700';
        }
        return view('components.blocks.table',[
            'rowClass' => $rowClass,
            'columns' => $this->columns,
            'data' => $this->data
        ]);
    }
}
