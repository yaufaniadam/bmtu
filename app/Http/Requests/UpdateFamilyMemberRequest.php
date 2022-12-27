<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFamilyMemberRequest extends FormRequest
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
            'nama' => ['required', 'string', 'max:255'],
            'jenis_kelamin' => ['required', 'string', "in:L,P", 'max:255'],
            'status' => ['required', 'string', "in:Anak,Suami,Istri", 'max:255'],
            'tempat_lahir' => ['required', 'string', 'max:255'],
            'tanggal_lahir' => ['required', 'date'],
            'bpjs' => ['string', 'max:255'],
            'bpjs_ketenagakerjaan' => ['string', 'max:255'],
        ];
    }
}
