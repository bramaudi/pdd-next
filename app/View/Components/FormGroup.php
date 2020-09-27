<?php

namespace App\View\Components;

use Illuminate\View\Component;

class FormGroup extends Component
{
    public $model, $type, $horizontal;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($model, $type = 'text', $horizontal = false)
    {
        $this->model = $model;
        $this->type = $type;
        $this->horizontal = $horizontal;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.form-group');
    }
}
