<?php

namespace App\Http\Requests;

use App\Models\User;
use App\Rules\CheckLinkUserRule;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => [
                'required', 'min:3'
            ],
            'email' => [
                'required', 'email', Rule::unique((new User)->getTable())->ignore($this->route()->user->id ?? null)
            ],
            'password' => [
                $this->route()->user ? 'nullable' : 'required', 'confirmed', 'min:6'
            ],
            'link_avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'phone' => 'numeric',
            'link_user' => ['alpha_num', new CheckLinkUserRule()]
        ];
    }
    public function messages()
    {
        return [
            'link_user.alpha_num' => 'Đường dẫn không được có khoảng trắng',
            'link_avatar.image' => 'Tệp tải lên phải là hình ảnh dạng "jpeg,png,jpg,gif,svg"',
            'link_avatar.mimes' => 'Tệp tải lên phải là hình ảnh dạng "jpeg,png,jpg,gif,svg"',
            'phone.numeric' => 'Vui lòng nhập từ 0-9'
        ];
    }
}
