<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseFormRequest extends FormRequest
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
            'name_en' => 'required',
            'name_ar' => 'required',
            'description_en' => 'required',
            'description_ar' => 'required',
            'hours' => 'required' ,
            'weeks' => 'required',
            'days_in_week' => 'required',
            'price' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'trainer_id' => 'required|exists:trainers,id',
            'category_id' => 'required|exists:categories,id',
            'icon' => 'mimes:jpeg,jpg,png',
        ];
    }
}
