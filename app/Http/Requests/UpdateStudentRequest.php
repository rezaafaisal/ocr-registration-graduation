<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStudentRequest extends FormRequest
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
            '_id' => 'required|integer|bail',
            // 'photo' => 'sometimes|required|image|max:2048',
            // 'name' => 'required|string',
            'nim' => 'required|size:11|unique:students,nim,'.$this->input('_id'),
            // 'email' => 'required|email|unique:students,email,'.$this->input('_id'),
            'password' => 'exclude_if:password,null|required|string',
        ];
    }
}
