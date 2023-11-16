<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name'=>'required|unique:tvd_product',
            'price_Import'=>'required',
            'price_retail'=>'required',
            'metakey'=>'required',
            'metadesc'=>'required',

        ];
    }
    public function messages(): array
    {
        return [
            'name.required'=>'Chưa nhập tên sản phẩm',
            'name.unique'=>'Tên sản phẩm đã tồn tại',
            'price_Import.required'=>'Giá nhập không được để trống',
            'price_retail.required'=>'Giá bán không được để trống',
            'metakey.required'=>'Từ khóa không được để trống',
            'metadesc.required'=>'Mô tả không được để trống',

        ];
    }
}
