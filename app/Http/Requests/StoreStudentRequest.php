<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentRequest extends FormRequest
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
            // 'photo' => 'required|image|max:2048',
            // 'name' => 'required|string',
            'nim' => 'required|size:11|unique:students,nim',
            // 'email' => 'required|email|unique:students,email',
            'password' => 'required|string',
        ];
    }
}
