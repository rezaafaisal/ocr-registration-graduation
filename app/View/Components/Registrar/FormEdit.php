<?php

namespace App\View\Components\Registrar;

use App\Models\Faculty;
use App\Models\Quota;
use App\Models\Registrar;
use App\Models\Student;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\View\Component;

class FormEdit extends Component
{
    public Collection $quotas;
    public Collection $students;
    public Collection $faculties;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(public Registrar $registrar, public string $index = '')
    {
        $this->quotas = Quota::all_open();
        $this->students = Student::all_without_registrar();
        $this->faculties = Faculty::all();
        $this->index ??= route('resources.registrar.index');
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.registrar.form-edit', [
            'registrar' => $this->registrar,
            'quotas' => $this->quotas,
            'students' => $this->students,
            'faculties' => $this->faculties,
        ]);
    }
}
