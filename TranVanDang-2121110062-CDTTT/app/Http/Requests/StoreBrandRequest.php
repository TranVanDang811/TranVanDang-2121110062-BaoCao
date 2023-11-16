<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBrandRequest extends FormRequest
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
            'name'=>'required|unique:tvd_brand',
            'metakey'=>'required',
            'metadesc'=>'required',
        ];
    }
    public function messages(): array
    {
        return [
            'name.required'=>'Chưa nhập tên thương hiệu',
            'name.unique'=>'Tên thương hiệu đã tồn tại',
            'metakey.required'=>'Từ khóa không được để trống',
            'metadesc.required'=>'Mô tả không được để trống',
        ];
    }
}
