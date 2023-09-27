<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'category_name' => 'required|unique:categories,category_name,' . $this->route('categor'),






        ];
    }
    public function messages()
    {
        return [
            'category_name.required'=>'hay nhap ten danh muc',
            'category_name.unique' => 'Tên danh muc nay da co roi ',

        ];
    }
}
