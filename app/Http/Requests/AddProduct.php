<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddProduct extends FormRequest
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
            'name' => 'required|unique:App\Models\Product,name',
            'description' => 'required',
            'price' => 'required|numeric',
            'details' => 'required',
            'stock' => 'required|numeric',
            'product_category_id' => 'required',
            'image_one_name' => 'required|unique:App\Models\ProductImage,image_one_name',
            'image_one' => 'required',
            'image_two_name' => 'nullable|unique:App\Models\ProductImage,image_two_name',
            'image_two' => 'nullable',
            'image_three_name' => 'nullable|unique:App\Models\ProductImage,image_three_name',
            'image_three' => 'nullable',
            'image_four_name' => 'nullable|unique:App\Models\ProductImage,image_three_name',
            'image_four' => 'nullable',
        ];
    }

        public function messages() {
            return [
                'required' => 'The :attribute field is required.',
                'numeric' => 'The :attribute only allows numbers without spaces.',
                'unique' => 'This :attribute name is already in use. Please use a new name'
            ];
    }
}
