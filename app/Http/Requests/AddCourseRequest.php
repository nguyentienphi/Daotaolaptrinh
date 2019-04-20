<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddCourseRequest extends FormRequest
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
            'title' => 'required',
            'description' => 'required',
            'price' => 'required',
            'category_id' => 'required',
            'user_id' => 'required',
            'picture' => 'required'
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => trans('add_course.validation.name.required'),
            'title.required' => trans('add_course.validation.title.required'),
            'description.required' => trans('add_course.validation.description.required'),
            'price.required' => trans('add_course.validation.price.required'),
            'category_id.required' => trans('add_course.validation.category.required'),
            'user_id.required' => trans('add_course.validation.user.required'),
            'picture.required' => trans('add_course.validation.picture.required'),
        ];
    }
}
