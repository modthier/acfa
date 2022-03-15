<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ScoreResultFormRequest extends FormRequest
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
            'exam_id' => 'required',
            'user_id' => 'required',
            'candidate_number' => 'required',
            'center_number' => 'required',
            'test_date' => 'required',
            'overall' => 'required',
            'listening' => 'required',
            'reading' => 'required',
            'writing' => 'required',
            'speaking' => 'required',
            'overall_band_score' => 'required',
            'overall_adjective' => 'required',
            'overall_description' => 'required',
        ];
    }
}
