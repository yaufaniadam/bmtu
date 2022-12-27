<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'name' => ['required', 'string', 'unique:users,name'],
            'email' => ['required', 'string', 'email:filter', 'unique:users,email'],
            'role' => ['required', 'string', 'exists:roles,id'],
            'password' => ['required', 'string', 'confirmed'],
            'nama_lengkap' => ['required', 'string'],
            'telepon' => ['required', 'string'],
            'nip' => ['required', 'string'],
            'alamat' => ['required', 'string'],
            'tempat_lahir' => ['required', 'string'],
            'tanggal_lahir' => ['required', 'date'],
            'foto' => ['required', 'image', 'mimes:jpg,png']
        ];
    }
}
