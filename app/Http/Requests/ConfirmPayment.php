<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConfirmPayment extends FormRequest
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
            'postcode' => 'required|max:6',
            'phone_number' => 'required|max:12|numeric',
            'email' => 'required|email|max:100'
        ];
    }

    public function messages() {
        return [
            'required' => 'This :attribute field is required',
            'max' => 'This :attribute field exceeds the maximum character limit',
            'numeric' => 'This :attribute field only allows numbers without spaces',
            'email' => 'This :attribute field must be a valid email addreses'
        ];
    }
}
