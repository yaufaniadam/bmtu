<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImportSalaryRequest extends FormRequest
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
            'month' => ['numeric', 'required', 'in:1,2,3,4,5,6,7,8,9,11,12'],
            'year' => ['numeric', 'required'],
            'file_excel' => ['required', 'file', 'mimes:xlsx']
        ];
    }
}
