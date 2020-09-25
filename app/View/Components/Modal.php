<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Modal extends Component
{
    public $state, $name, $header, $footer;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($state, $name = '', $header = '', $footer = '')
    {
        $this->state = $state;
        $this->name = $name;
        $this->header = $header;
        $this->footer = $footer;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.modal');
    }
}
