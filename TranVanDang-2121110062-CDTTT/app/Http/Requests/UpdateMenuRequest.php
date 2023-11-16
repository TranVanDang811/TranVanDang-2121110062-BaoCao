<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMenuRequest extends FormRequest
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
            'name'=>'required|unique:tvd_menu',
            'link'=>'required',
            'metakey'=>'required',
            'metadesc'=>'required',
        ];
    }
    public function messages(): array
    {
        return [
            'name.required'=>'Chưa nhập tên danh mục',
            'link.required'=>'Chưa nhập link',
            'name.unique'=>'Tên danh mục đã tồn tại',
            'metakey.required'=>'Từ khóa không được để trống',
            'metadesc.required'=>'Mô tả không được để trống',
        ];
    }
}
