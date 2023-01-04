<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFinancingPartnerRequest extends FormRequest
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
            'nama_lengkap' => ['required', 'string', 'max:255'],
            'alamat' => ['required', 'string', 'max:255'],
            'kabupaten' => ['required', 'string', 'max:255'],
            'telepon' => ['required', 'string', 'max:255'],
            'email' => ['email:filter', 'max:255', 'nullable'],
            'pekerjaan' => ['required', 'string', 'max:255'],
            'pendidikan_terakhir' => ['required', 'string', 'max:255'],
            'foto' => ['required', 'image', 'mimes:jpg,png']
        ];
    }
}
