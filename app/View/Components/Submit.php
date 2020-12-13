<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Submit extends Component
{
    public $text;
    public $disabled;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($text = 'Submit', $disabled = false)
    {
        $this->text = $text;
        $this->disabled = $disabled;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.submit');
    }
}
