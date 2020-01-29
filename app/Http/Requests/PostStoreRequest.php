<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostStoreRequest extends FormRequest
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
            'name' => 'required|string|min:3|max:255',
            'content' => 'required|string|min:3|max:5000',
            'file' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'category_id' => 'required|integer|exists:categories,id',
        ];
    }
}
