<?php

namespace App\View\Components;

use Illuminate\View\Component;

class FormGroupSelect extends Component
{
    public $model, $selected, $horizontal, $options, $error;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($model, $selected = null, $horizontal = false, $options = [])
    {
        $this->model = $model;
        $this->selected = $selected;
        $this->horizontal = $horizontal;
        $this->options = $options;
        // Ex: input.nama => nama
        $error = explode('.', $model);
        $this->error = $error[count($error) - 1];
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.form-group-select');
    }
}
