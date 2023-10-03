<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'product_name'=>'required|unique:products,product_name,' . $this->route('product'),
        ];
    }
    public function messages()
    {return[

        'product_name.required' => 'Hãy nhập tên sản phẩm thuộc danh mục này',
        'product_name.unique' => 'Tên sản phẩm đã có trong danh mục này rồi',

    ];

    }
}
