<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreVideoRequest extends FormRequest
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
            'nameVid' => 'required|string|max:255',
            'conditionVid' => 'required|string|not_in:لم يتم التحديد',
            'sideVid' => 'required|string|not_in:لم يتم التحديد',
            'textKey' => 'required|string',
            'selectfileVid' => 'required', 
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
            'nameVid.required' => 'يرجى إدخال اسم الفيديو.',
            'nameVid.string' => 'اسم الفيديو يجب أن يكون نصًا.',
            'nameVid.max' => 'اسم الفيديو يجب ألا يتجاوز 255 حرفًا.',
            'conditionVid.required' => 'يرجى تحديد حالة الفيديو.',
            'conditionVid.not_in' => 'يرجى اختيار حالة الفيديو الصحيحة.',
            'sideVid.required' => 'يرجى إدخال جهة الفيديو.',
            'sideVid.not_in' => 'يرجى اختيار جهة الفيديو الصحيحة.',
            'textKey.required' => 'يرجى إدخال الكلمات المفتاحية.',
            'textKey.string' => 'الكلمات المفتاحية يجب أن تكون نصًا.',
            'selectfileVid.required' => 'يرجى اختيار الفيديوهات.',
            'selectfileVid.array' => 'يجب أن تكون الفيديوهات المختارة ضمن مجموعة.',
            'dicraption.required' => 'يرجى إدخال وصف الفيديو.',
            'dicraption.string' => 'الوصف يجب أن يكون نصًا.',
        ];
    }
}
