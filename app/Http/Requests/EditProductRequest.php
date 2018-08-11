<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EditProductRequest extends FormRequest
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
            'desc_vi' => 'required|string|min:2|max:45',
            'price' => 'required|integer|min:1000',
            'category' => 'required|integer',
            'quantity' => 'required|integer|min:1',
            'brand' => 'required|integer',
            'promotion' => [
                'required','integer',
                Rule::in([Product::UN_PROMONTION, Product::PROMONTION])
            ],
            'content_vi' => 'required|string|min:2|max:1000',
            'desc_la' => 'required|string|min:2|max:45',
            'content_la' => 'required|string|min:2|max:45',
            'image-service' => 'nullable|file|image|max:10240',
        ];
    }
}
