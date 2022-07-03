<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\UserInfoManagement;
class CheckLinkUserRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $userId = auth()->user()->id;
        $checkNameUser =  UserInfoManagement::find($userId);
        if(!$checkNameUser OR $checkNameUser->link_user == $value) return true;
        $userInfo = UserInfoManagement::where('link_user',$value)->first();
        if($userInfo)
            return false;
        else
            return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Liên kết đã tồn tại';
    }
}
