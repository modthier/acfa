<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CertificateIdFormRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'certificate_name' => 'required',
            'certificate_id' => 'required',
            'user_id' => 'required',
            'issue_date' => 'required',
            'image' => 'sometimes|required|mimes:jpeg,jpg,png'
        ];
    }
}
