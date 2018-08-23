<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Formjy extends FormRequest
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
            "zh" => 'required|regex:/\w{6}/|unique:biao',
            "mm" => "required|regex:/\d{6}/"
        ];
    }

    public function messages()
    {
        return [
            "zh.required" => "用户名不能为空",
            "zh.regex"    => "请输入6位",
            "zh.unique"   => "此用户名已存在",
            "mm.required" => "密码不能为空",
            "mm.regex"    => "请输入6位数字"
        ];
    }
}
