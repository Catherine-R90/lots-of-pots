<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditRecipe extends FormRequest
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
            'name' => 'unique:App\Models\Recipe,name|nullable',
            'prep_time' => 'numeric|nullable',
            'cook_time' => 'numeric|nullable',
            'category_id' => 'nullable',
            'num_of_ingredients' => 'nullable',
            'image_one_name' => 'unique:App\Models\RecipeImage,image_one_name|nullable',
            'image_two_name' => 'nullable|unique:App\Models\RecipeImage,image_two_name',
            'image_two' => 'nullable',
            'image_three_name' => 'nullable|unique:App\Models\RecipeImage,image_three_name',
            'image_three' => 'nullable',
        ];
    }

    public function messages() {
        return [
            'required' => 'The :attribute field is required.',
            'numeric' => 'The :attribute only allows numbers without spaces.',
            'unique' => 'The name for the :attribute field is already in use. Please use a new name'
        ];
    }
}
