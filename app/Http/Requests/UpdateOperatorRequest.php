<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOperatorRequest extends FormRequest
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
            // 'photo' => 'nullable|image|max:2048',
            'name' => 'required|string|unique:operators,name,' . request()->input('_id'),
            'department' => 'required|string',
            'faculty' => 'required_if:department,faculty',
            // 'email' => 'required|email|unique:operators,email,' . request()->input('_id'),
            'password' => 'nullable|string|confirmed',
            'password_confirmation' => 'nullable|string',
        ];
    }
}
