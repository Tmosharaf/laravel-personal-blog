<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class StorePostRequest extends FormRequest
{
    protected $thumbnail;
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
     * @return array<string, mixed>
     */

    public function rules()
    {
        return [
            'title' => 'required|min:3',
            'description' => 'required|min:10',
            'category' => 'required|exists:categories,id',
            'thumbnail' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'is_featured' => 'boolean',
        ];
    }
}
