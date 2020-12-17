<?php

namespace App\View\Components;

use Illuminate\View\Component;

class breadcrumb extends Component
{
    public $prev, $current;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Array $prev, String $current)
    {
        $this->prev = $prev;
        $this->current = $current;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.breadcrumb');
    }
}
