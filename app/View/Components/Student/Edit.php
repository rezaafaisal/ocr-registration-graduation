<?php

namespace App\View\Components\Student;

use App\Models\Student;
use Illuminate\View\Component;

class Edit extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(public Student $student)
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
        return view('components.student.edit', ['student' => $this->student]);
    }
}
