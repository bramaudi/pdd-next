<?php

namespace App\View\Components;

use Illuminate\View\Component;

class FormGroup extends Component
{
    public $model, $type, $error, $step, $disabled;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($model, $type = 'text', $disabled = false)
    {
        $this->model = $model;
        $this->type = $type;
        $this->step = $type == 'time' ? 'step=1' : '';
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
        return view('components.form-group');
    }
}
