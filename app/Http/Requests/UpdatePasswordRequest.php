<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePasswordRequest extends FormRequest
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
            'email' => ['sometimes', 'required', 'email:filter'],
            'token' => ['sometimes', 'required', 'string'],
            'password' => ['sometimes', 'required', 'string', 'current_password'],
            'new_password' => ['required', 'string', 'confirmed'],
        ];
    }
}
