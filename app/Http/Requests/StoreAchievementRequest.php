<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAchievementRequest extends FormRequest
{
    protected $errorBag = "StoreAchievement";
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
            'prestasi' => ['required', 'string', 'max:255'],
            'tanggal' => ['required', 'date'],
        ];
    }
}
