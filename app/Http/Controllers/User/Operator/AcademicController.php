<?php

namespace App\Http\Controllers\User\Operator;

use App\Http\Controllers\Controller;
use App\Models\Quota;
use App\Models\Registrar;
use App\Models\Student;
use Illuminate\Support\Str;

class AcademicController extends Controller
{
    public function dashboard()
    {
        return view('operator.academic.dashboard', [
            'quota' => Quota::stats(),
            'registrar' => Registrar::stats_status(),
        ]);
    }
    public function empty()
    {
        return view('operator.academic.empty');
    }

    public function registrar_validate()
    {
        $this->authorize('viewAny', Registrar::class);
        return view('operator.academic.registrar.validate.index', [
            'data' => Registrar::all(),
        ]);
    }
    public function registrar_revision()
    {
        $this->authorize('viewAny', Registrar::class);
        return view('operator.academic.registrar.revision.index', [
            'data' => Registrar::all(),
        ]);
    }
    public function registrar_revalidate()
    {
        $this->authorize('viewAny', Registrar::class);
        return view('operator.academic.registrar.revalidate.index', [
            'data' => Registrar::all(),
        ]);
    }
    public function registrar_validated()
    {
        $this->authorize('viewAny', Registrar::class);
        return view('operator.academic.registrar.validated.index', [
            'data' => Registrar::all(),
        ]);
    }

    public function registrar_validate_validate(Registrar $registrar)
    {
        return view('operator.academic.registrar.validate.validate', ['registrar' => $registrar]);
    }
    public function registrar_revision_validate(Registrar $registrar)
    {
        return view('operator.academic.registrar.revision.validate', ['registrar' => $registrar]);
    }
    public function registrar_revalidate_validate(Registrar $registrar)
    {
        return view('operator.academic.registrar.revalidate.validate', ['registrar' => $registrar]);
    }
    public function registrar_validated_validate(Registrar $registrar)
    {
        return view('operator.academic.registrar.validated.validate', ['registrar' => $registrar]);
    }

    public function student_index()
    {
        return view('operator.academic.student.index', []);
    }
    public function student_create()
    {
        return view('operator.academic.student.create', [
            'password'=> Str::random(8),
        ]);
    }
    public function student_edit(Student $student)
    {
        return view('operator.academic.student.edit', ['student' => $student]);
    }
}
