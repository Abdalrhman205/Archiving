<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DocumentsRequest extends FormRequest
{
    // تحديد ما إذا كان المستخدم مصرح له بإرسال الطلب
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nameDoc' => 'required|string|max:255',
            'conditionDoc' => 'required|string|not_in:لم يتم التحديد',
            'sideDoc' => 'required|string|not_in:لم يتم التحديد',
            'textKey' => 'required|string',
            'selectfileDoc' => 'required',
            'dicraption' => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'nameDoc.required' => 'يرجى إدخال اسم المستند.',
            'nameDoc.string' => 'اسم المستند يجب أن يكون نصًا.',
            'nameDoc.max' => 'اسم المستند يجب ألا يتجاوز 255 حرفًا.',
            'conditionDoc.required' => 'يرجى تحديد حالة المستند.',
            'conditionDoc.not_in' => 'يرجى اختيار حالة المستند.',
            'textKey.required' => 'يرجى إدخال النص المفتاح.',
            'sideDoc.required' => 'يرجى إدخال جهة المستند.',
            'sideDoc.not_in' => 'يرجى اختيار جهة المستند.',
            'selectfileDoc.required' => 'يرجى اختيار مستنذ .',
            'dicraption.required' => 'يرجى إدخال وصف المستند.',
            'dicraption.string' => 'الوصف يجب أن يكون نصًا.',
        ];
    }
}
