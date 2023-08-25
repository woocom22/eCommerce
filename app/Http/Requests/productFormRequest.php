<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class productFormRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
        'category_id' => [
            'required',
            'integer'
        ],
        'name'=> [
            'required',
            'string'
        ],
        'slug'=> [
            'required'

        ],
        'brand'=> [
            'required',
            'string'
        ],
        'smaill_description'=> [
            'required',
            'string'
        ],
        'description'=> [
            'required',
            'string'
        ],
        'orginal_price'=> [
            'required',
            'integer'
        ],
        'selling_price'=> [
            'required',
            'integer'
        ],
        'quantity'=> [
            'required',
            'integer'
        ],
        'trending'=> [
            'required'
        ],
        'status'=> [
            'nullable'
        ],
        'meta_title'=> [
            'required',
            'string'
        ],
        'meta_keyword'=> [
            'required',
            'string'
        ],
        'meta_description' => [
            'required',
            'string'
        ],
        'image' => [
            'required',
            // 'image|mimes:png,jpg'
        ],

        ];
    }
}
