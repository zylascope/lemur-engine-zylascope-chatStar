<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Category;

class CreateCategoryRequest extends HiddenIdRequest
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
        $rules = Category::$rules;

        if (!$this->input('category_group_id', false) && !$this->input('category_group_slug', false)) {
            $rules['category_group_id'] = 'required';
        } else {
            unset($rules['category_group_id']);
        }

        return $rules;
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'category_group_id.required' => 'Missing category group.',
        ];
    }
}
