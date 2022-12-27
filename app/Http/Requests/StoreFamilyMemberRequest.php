<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFamilyMemberRequest extends FormRequest
{
    protected $errorBag = "StoreFamilyMember";
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
            'id_pegawai' => ['required', 'string', 'exists:tr_pegawai,id', 'max:255'],
            'nama_keluarga' => ['required', 'string', 'max:255'],
            'jenis_kelamin_keluarga' => ['required', 'string', "in:L,P", 'max:255'],
            'status_keluarga' => ['required', 'string', "in:Anak,Suami,Istri", 'max:255'],
            'tempat_lahir_keluarga' => ['required', 'string', 'max:255'],
            'tanggal_lahir_keluarga' => ['required', 'date'],
            'bpjs_keluarga' => ['string', 'max:255'],
            'bpjs_ketenagakerjaan_keluarga' => ['string', 'max:255'],
        ];
    }
}
