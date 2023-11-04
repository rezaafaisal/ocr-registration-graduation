<?php

namespace App\Http\Controllers\User\Operator;

use App\Http\Controllers\Controller;
use App\Models\Quota;
use App\Models\Registrar;
use App\Models\Student;
use Illuminate\Support\Str;

class FacultyController extends Controller
{
    public function dashboard()
    {
        return view('operator.faculty.dashboard', [
            'quota' => Quota::stats(),
            'registrar' => Registrar::stats_status(auth()->user()->faculty),
        ]);
    }
    public function empty()
    {
        return view('operator.faculty.empty');
    }

    public function registrar_validate()
    {
        $this->authorize('viewAny', Registrar::class);
        return view('operator.faculty.registrar.validate.index', [
            'data' => Registrar::all(),
        ]);
    }
    public function registrar_revision()
    {
        $this->authorize('viewAny', Registrar::class);
        return view('operator.faculty.registrar.revision.index', [
            'data' => Registrar::all(),
        ]);
    }
    public function registrar_revalidate()
    {
        $this->authorize('viewAny', Registrar::class);
        return view('operator.faculty.registrar.revalidate.index', [
            'data' => Registrar::all(),
        ]);
    }
    public function registrar_validated()
    {
        $this->authorize('viewAny', Registrar::class);
        return view('operator.faculty.registrar.validated.index', [
            'data' => Registrar::all(),
        ]);
    }

    public function registrar_validate_validate(Registrar $registrar)
    {
        return view('operator.faculty.registrar.validate.validate', ['registrar' => $registrar]);
    }
    public function registrar_revision_validate(Registrar $registrar)
    {
        return view('operator.faculty.registrar.revision.validate', ['registrar' => $registrar]);
    }
    public function registrar_revalidate_validate(Registrar $registrar)
    {
        return view('operator.faculty.registrar.revalidate.validate', ['registrar' => $registrar]);
    }
    public function registrar_validated_validate(Registrar $registrar)
    {
        return view('operator.faculty.registrar.validated.validate', ['registrar' => $registrar]);
    }

    public function student_index()
    {
        return view('operator.faculty.student.index', []);
    }
    public function student_create()
    {
        return view('operator.faculty.student.create', [
            'password'=> Str::random(8),
        ]);
    }
    public function student_edit(Student $student)
    {
        return view('operator.faculty.student.edit', ['student' => $student]);
    }
}
