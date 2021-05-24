<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddRecipe extends FormRequest
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
            'name' => 'required|unique:App\Models\Recipe,name',
            'prep_time' => 'required|numeric',
            'cook_time' => 'required|numeric',
            'instructions' => 'required',
            'recipe_category' => 'required',
            'description' => 'required',
            'num_of_ingredients' => 'required|numeric',
            'image_name' => 'required|unique:App\Models\RecipeImage,image_one_name',
            'image_one' => 'required',
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
