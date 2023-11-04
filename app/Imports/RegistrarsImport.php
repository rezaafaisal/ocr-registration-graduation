<?php

namespace App\Imports;

use App\Models\Quota;
use App\Models\Registrar;
use App\Models\Student;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;

class RegistrarsImport implements ToModel, WithHeadingRow, WithValidation
{
    use Importable;
    public function __construct()
    {
        HeadingRowFormatter::default('none');
    }
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $quota = Quota::first_open();
        $student = Student::create([
            'nim' => $row[__("nim")],
            'password' => Str::random(8),
        ]);
        return new Registrar([
            'quota_id' => $quota->id,
            'student_id' => $student->id,
            'name' => $row[__("name")],
            'nim' => $row[__("nim")],
            'nik' => $row[__("nik")],
            'pob' => $row[__("place of birth")],
            'dob' => $row[__("date of birth")],
            'doe' => $row[__("date of entry")],
            'dop' => $row[__("date of pass")],
            'faculty' => $row[__("faculty")],
            'study_program' => $row[__("study program")],
            'ipk' => $row[__("ipk")],
            'gender' => $row[__("gender")],
        ]);
    }

    public function rules(): array
    {
        return [
            __('name') => 'required|string',
            __('nim') => 'required|string|size:11',
            __('nik') => 'required|string|size:16',
            __('place of birth') => 'required|string',
            __('date of birth') => 'required|date',
            __('date of entry') => 'nullable|date',
            __('date of pass') => 'nullable|date',
            __('faculty') => 'required|string',
            __('study program') => 'required|string',
            __('ipk') => 'required|numeric',
            __('gender') => 'nullable|in:male,female',
        ];
    }
}
