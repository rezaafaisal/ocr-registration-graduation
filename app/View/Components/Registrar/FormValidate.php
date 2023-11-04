<?php

namespace App\View\Components\Registrar;

use App\Models\Registrar;
use Illuminate\Http\Request;
use Illuminate\View\Component;

class FormValidate extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(public Registrar $registrar, public string $index = '')
    {
        $this->index ??= route('resources.registrar.index');
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.registrar.form-validate', ['registrar' => $this->registrar]);
    }
}
