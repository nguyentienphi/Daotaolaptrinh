<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class EditUserRequest extends FormRequest
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
    public function rules(Request $request)
    {
        return [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $request->user->id . ',id'
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => trans('add_user.validation.name.required'),
            'email.required' => trans('add_user.validation.email.required'),
            'email.email' => trans('add_user.validation.email.email'),
            'email.unique' => trans('add_user.validation.email.unique'),
        ];
    }
}
