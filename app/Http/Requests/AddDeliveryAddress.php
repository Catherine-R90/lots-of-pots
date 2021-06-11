<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;

class AddDeliveryAddress extends FormRequest
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
            'name' => 'required|max:255',
            'first_line' => 'required|max:255',
            'second_line' => 'nullable|max:255',
            'city' => 'required|max:255',
            'postcode' => 'required|regex:/[A-Z]{1,2}[0-9][0-9A-Z]{0,1} {0,1}[0-9][A-Z]{2}/',
            'phone_number' => [
                'required',
                'regex:/((\(?0\d{4}\)?\s?\d{3}\s?\d{3})|(\(?0\d{3}\)?\s?\d{3}\s?\d{4})|(\(?0\d{2}\)?\s?\d{4}\s?\d{4}))(\s?\#(\d{4}|\d{3}))?$/'
            ],
            'email' => 'required|email|max:100',
        ];
    }

    public function messages() {
        return [
            'required' => 'This :attribute field is required',
            'max' => 'This :attribute field exceeds the maximum character limit',
            'regex' => 'This :attribute is formatted incorrectly',
            'email' => 'This :attribute field must be a valid email addreses'
        ];
    }
}
