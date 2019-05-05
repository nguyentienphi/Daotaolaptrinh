<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RatingRequest extends FormRequest
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
            'contentRating' => 'required|max:255',
            'starRatingValue' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'contentRating.required' => 'Trường nội dung đánh gía không đưọc bỏ trống',
            'contentRating.max' => 'Nội dung đánh gía không quá 255 ký tự',
            'starRatingValue.required' => 'Bạn phải chọn số lượng sao trước khi gửi đánh gía'
        ];
    }
}
