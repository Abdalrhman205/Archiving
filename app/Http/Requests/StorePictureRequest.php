<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePictureRequest extends FormRequest
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
            'namePic' => 'required|string|max:255',
            'conditionPic' => 'required|string|not_in:لم يتم التحديد',
            'sidePic' => 'required|string|not_in:لم يتم التحديد',
            'textKey' => 'required|string',
            'selectfilePic' => 'required', 
            'dicraption' => 'required|string',
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
            'namePic.required' => 'يرجى إدخال اسم الصورة.',
            'namePic.string' => 'اسم الصورة يجب أن يكون نصًا.',
            'namePic.max' => 'اسم الصورة يجب ألا يتجاوز 255 حرفًا.',
            'conditionPic.required' => 'يرجى تحديد حالة الصورة.',
            'conditionPic.not_in' => 'يرجى اختيار حالة الصورة الصحيحة.',
            'sidePic.required' => 'يرجى إدخال جهة الصورة.',
            'sidePic.not_in' => 'يرجى اختيار جهة الصورة الصحيحة.',
            'textKey.required' => 'يرجى إدخال الكلمات المفتاحية.',
            'textKey.string' => 'الكلمات المفتاحية يجب أن تكون نصًا.',
            'selectfilePic.required' => 'يرجى اختيار الصورة.',
            'dicraption.required' => 'يرجى إدخال وصف الصورة.',
            'dicraption.string' => 'الوصف يجب أن يكون نصًا.',
        ];
    }
}
