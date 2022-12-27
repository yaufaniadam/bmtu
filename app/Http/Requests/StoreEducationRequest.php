<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEducationRequest extends FormRequest
{
    protected $errorBag = "StoreEducation";
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
            'pendidikan' => ['required', 'string', "in:SMA / Sederajat,S1,S2,S3", 'max:255'],
            'nama_lembaga_pendidikan' => ['required', 'string', 'max:255'],
            'tahun' => ['required', 'numeric', 'min:1900', 'max:' . date('Y')],
            'jurusan' => ['required', 'string', 'max:255'],
            'file_ijazah' => ['required', 'file', 'mimes:jpg,png,pdf'],
        ];
    }
}
