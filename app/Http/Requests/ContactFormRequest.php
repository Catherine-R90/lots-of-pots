<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactFormRequest extends FormRequest
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
            'name' => 'required|max: 255',
            'emailAddress' => 'required|email|max: 255',
            'phone' => 'nullable|numeric',
            'mobile' => 'nullable|numeric',
            'order-receipt-number' => 'nullable',
            'subject' => 'required|max: 255',
            'message' => 'required'
        ];

    }

    public function messages() {
        return [
            'required' => 'This :attribute field is required.',
            'email' => 'The :attribute must be a valid email address.',
            'numeric' => 'This :attribute only allows numbers without spaces.'
        ];
    }
}
