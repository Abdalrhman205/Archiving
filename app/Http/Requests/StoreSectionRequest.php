<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSectionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; // Set to true if authorization is not needed
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nameSection' => 'required|string|max:255',
        ];
    }
    /**
     * Get the custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'nameSection.required' => 'يرجى إدخال اسم القسم.',
            'nameSection.string' => 'اسم القسم يجب أن يكون نصًا.',
            'nameSection.max' => 'اسم القسم يجب ألا يتجاوز 255 حرفًا.',
        ];
    }
}
