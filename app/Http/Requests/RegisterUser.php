<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterUser extends FormRequest
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
            'first_name' => 'required|string|max:255',
            'second_name' => 'required|string|max:255',
            "email_address" => "required|unique:App\Models\User,email|email",
            "password" => "required",
            "confirm_password" => "required|same:password"
        ];
    }

    public function messages() {
        return [
            'string' => 'The :attribute field can only be letters',
            'max' => 'The :attribute field exceeds the character limit',
            "required" => "The :attribute is required",
            "unique" => "This email is already registered",
            "same" => "The password does not match, please try again"
        ];
    }
}
