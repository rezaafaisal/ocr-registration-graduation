<?php

namespace App\View\Components\ArchiveRegistrar;

use App\Models\ArchiveRegistrar;
use Illuminate\View\Component;

class View extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(public ArchiveRegistrar $registrar)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.archive-registrar.view', [
            'registrar' => $this->registrar,
        ]);
    }
}
