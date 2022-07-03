<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserInfoManagement;
use App\Models\UserLinkedManagement;
class UserInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        return UserInfoManagement::where('link_user',$id)->get();
    }

    public function infomation($linkUser)
    {
       // return User::find(1)->getAffiliateTemplates;
        $userInfo = UserInfoManagement::leftJoin('users', function($join) {
            $join->on('users.id', '=', 'vipcard_user_management.id');
        })->where('link_user',$linkUser)
            ->select('vipcard_user_management.*',
                'users.is_active as users_is_active',
                'users.created_at as user_create_at');
        return $userInfo->get();
    }


    public function linked($linkUser)
    {
        $userId = $this->getUserId($linkUser);
        $c = UserLinkedManagement::leftJoin('vipcard_affiliate_templates', function($join) {
            $join->on('vipcard_linked_user.affiliate_id', '=', 'vipcard_affiliate_templates.id');
        })->where('user_id',$userId)
        ->select('vipcard_linked_user.*',
                'vipcard_affiliate_templates.affiliate_id as templates_affiliate_id',
                'vipcard_affiliate_templates.affiliate_name as templates_affiliate_name',
                'vipcard_affiliate_templates.affiliate_icon as templates_affiliate_icon',
                'vipcard_affiliate_templates.affiliate_link  as templates_affiliate_link',
        );
        return $c->get();

    }

    protected function getUserId($linkUser){
        $userInfo = UserInfoManagement::where('link_user',$linkUser)->first();
        return $userInfo->id;

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
