<?php

namespace App\View\Components;

use Illuminate\View\Component;

class table extends Component
{
    public $headers;
    public $dataArray;
    public $title;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($headers, $data, $title)
    {
        $this->headers = $headers;
        $this->dataArray = $data;
        $this->title = $title;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.table');
    }
}
