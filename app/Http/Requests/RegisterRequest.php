<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' => 'required|max:32',
            'email' => 'required|email|unique:users|max:40',
            'password' => 'required|min:6|max:32|regex:/^\S*(?=\S*[a-zA-Z])(?=\S*[\W])(?=\S*[\d])\S*$/|confirmed',
        ];
    }

    public function messages()
    {
        return [
            'password.regex' => trans('validation.password_without_spaces_and_require_letter_number_special_character'),
            'password.min' => 'Mật khẩu phải nhiều hơn 6 ký tự và ít hơn 32 ký tự',
            'password.max' => 'Mật khẩu phải nhiều hơn 6 ký tự và ít hơn 32 ký tự',
            'email.max' => 'Email nhập không quá 40 ký tự',
        ];
    }
}
