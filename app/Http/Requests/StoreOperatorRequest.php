<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOperatorRequest extends FormRequest
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
            'name' => 'required|string|unique:operators,name',
            'department' => 'required|string',
            'faculty' => 'required_if:department,faculty',
            // 'email' => 'required|email|unique:operators,email',
            'password' => 'required|string|confirmed',
            'password_confirmation' => 'required|string',
        ];
    }
}
