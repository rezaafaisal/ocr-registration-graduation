<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRegistrarRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'quota_id' => 'required|integer',
            'student_id' => 'required|integer',
            'photo' => 'required|image|max:2048',
            'name' => 'required|string',
            'nim' => 'required|string|size:11',
            'nik' => 'required|string|size:16',
            'pob' => 'required|string',
            'dob' => 'required|date',
            'doe' => 'nullable|date',
            'dop' => 'nullable|date',
            'faculty' => 'required|string',
            'study_program' => 'required|string',
            'ipk' => 'required|numeric',
            'gender'=>'nullable|in:male,female',

            'munaqasyah' => 'required|image|max:2048',
            'school_certificate' => 'required|image|max:2048',
            'ktp' => 'required|image|max:2048',
            'kk' => 'required|image|max:2048',
            'spukt' => 'required|image|max:2048',
        ];
    }
}
