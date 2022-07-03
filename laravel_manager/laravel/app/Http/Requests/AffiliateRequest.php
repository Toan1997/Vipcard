<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AffiliateRequest extends FormRequest
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
            'affiliate_id' => 'alpha_num',
            'affiliate_icon' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ];
    }

    public function messages()
    {
        return [
            'affiliate_id.alpha_num' => 'Liên kết ID không được có khoảng trắng',
            'affiliate_icon.image' => 'Tệp tải lên phải là hình ảnh dạng "jpeg,png,jpg,gif,svg"',
            'affiliate_icon.mimes' => 'Tệp tải lên phải là hình ảnh dạng "jpeg,png,jpg,gif,svg"',
            'affiliate_icon.max' => 'Ảnh tải lên không quá 2048M'
        ];
    }
}
