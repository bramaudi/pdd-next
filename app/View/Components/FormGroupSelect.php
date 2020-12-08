<?php

namespace App\View\Components;

use Illuminate\View\Component;

class FormGroupSelect extends Component
{
    public $model, $selected, $options, $error, $disabled;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($model, $selected = null, $options = [], $disabled = false)
    {
        $this->model = $model;
        $this->selected = $selected;
        $this->options = $options;
        $this->disabled = $disabled ? 'disabled': '';

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
