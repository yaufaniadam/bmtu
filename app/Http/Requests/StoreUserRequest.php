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
            'name' => ['required', 'string', 'unique:users,name', 'max:255'],
            'email' => ['required', 'string', 'email:filter', 'unique:users,email', 'max:255'],
            'role' => ['required', 'string', 'exists:roles,id', 'max:255'],
            'password' => ['required', 'string', 'confirmed', 'max:255'],
            'nama_lengkap' => ['required', 'string', 'max:255'],
            'nip' => ['required', 'string', 'max:255'],
            'telepon' => ['required', 'string', 'max:255'],
            'nip' => ['required', 'string', 'max:255'],
            'alamat' => ['required', 'string', 'max:255'],
            'tempat_lahir' => ['required', 'string', 'max:255'],
            'tanggal_lahir' => ['required', 'date', 'max:255'],
            'foto' => ['required', 'image', 'mimes:jpg,png', 'max:255']
        ];
    }
}
