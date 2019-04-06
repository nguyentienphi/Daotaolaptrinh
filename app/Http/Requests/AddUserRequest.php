<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddUserRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
        ];
    }

    /**
     * Set value message rules
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => trans('add_user.validation.name.required'),
            'email.required' => trans('add_user.validation.email.required'),
            'email.email' => trans('add_user.validation.email.email'),
            'email.unique' => trans('add_user.validation.email.unique'),
            'password.required' => trans('add_user.validation.password.required'),
            'password.min' =>  trans('add_user.validation.password.min', [
                'min' => 8,
            ]),
        ];
    }
}
