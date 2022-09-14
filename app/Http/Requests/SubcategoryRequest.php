<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class SubcategoryRequest extends FormRequest
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
            'name' => [
                'required','max:255',
                Rule::unique('subcategories')->ignore($this->id),
            ],
            'category_id'=>'required',
            // 'slug' => 'required|max:255',
            'rank' => 'required|integer|min:1',
            'short_description' =>'required|max:255',
            'description' =>'required',
            // 'image_file' =>'required',
            // 'meta_keyword' => 'required|max:255',
            // 'meta_title' => 'required|max:255',
            // 'meta_description' => 'required|max:255',
        ];
    }
}
