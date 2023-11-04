<?php

namespace App\View\Components\Quota;

use App\Models\Quota;
use Illuminate\View\Component;

class Edit extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(public Quota $quota)
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
        return view('components.quota.edit', ['quota' => $this->quota]);
    }
}
