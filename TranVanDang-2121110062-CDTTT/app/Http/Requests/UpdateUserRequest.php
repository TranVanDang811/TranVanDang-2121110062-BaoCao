<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'name' => 'required|unique:tvd_user,name,' ,
            'email' => 'required|email|unique:tvd_user,email,' ,
            'phone'=>'required',
            'address'=>'required',
            'username'=>'required:tvd_user',

        ];
    }
    public function messages(): array
    {
        return [
            'name.required'=>'Chưa nhập tên người dùng',
            'name.unique'=>'Tên người dùng đã tồn tại',
            'email.required'=>'Chưa nhập email người dùng',
            'email.unique'=>'Tên email người dùng đã tồn tại',
            'username.required'=>'Chưa nhập tên đăng nhập',
            'username.unique'=>'Tên đăng nhập đã tồn tại',
            'phone.required'=>'Chưa nhập số điện thoại',
            'address.required'=>'Chưa nhập địa chỉ',

        ];
    }
}
