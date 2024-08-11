<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFileRequest extends FormRequest
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
            'nameFile' => 'required|string|max:255',
            'conditionFile' => 'required|string|not_in:لم يتم التحديد',
            'sideFile' => 'required|string|not_in:لم يتم التحديد',
            'textKey' => 'required|string',
            'selectfileFile' => 'required|file',
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
            'nameFile.required' => 'يرجى إدخال اسم الملف.',
            'nameFile.string' => 'اسم الملف يجب أن يكون نصًا.',
            'nameFile.max' => 'اسم الملف يجب ألا يتجاوز 255 حرفًا.',
            'conditionFile.required' => 'يرجى تحديد حالة الملف.',
            'conditionFile.not_in' => 'يرجى اختيار حالة الملف الصحيحة.',
            'sideFile.required' => 'يرجى إدخال جهة الملف.',
            'sideFile.not_in' => 'يرجى اختيار جهة الملف الصحيحة.',
            'textKey.required' => 'يرجى إدخال الكلمات المفتاحية.',
            'textKey.string' => 'الكلمات المفتاحية يجب أن تكون نصًا.',
            'selectfileFile.required' => 'يرجى اختيار الملف.',
            'selectfileFile.file' => 'يجب أن يكون الملف المرفوع صالحًا.',
            'dicraption.required' => 'يرجى إدخال وصف الملف.',
            'dicraption.string' => 'الوصف يجب أن يكون نصًا.',
        ];
    }
}
