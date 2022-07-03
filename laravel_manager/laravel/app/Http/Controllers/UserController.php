<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserInfoRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\UserInfoManagement;
use App\Models\UserLinkedManagement;
use App\Rules\CheckLinkUserRule;
use App\Rules\CheckInputLinkUserRule;
class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\Models\User  $model
     * @return \Illuminate\View\View
     */
    public function index(User $model)
    {
        $userId = auth()->user()->id;
        $isAdmin = auth()->user()->is_admin;
        if($isAdmin)
            $users = $model::paginate(10);
        else
            $users = $model::where('id',$userId)->paginate(1);
        return view('users.index',compact(['users']));
    }

    public function create()
    {
        return view('users.create');
    }
    public function info($userId = null){
        $userId = getBase64Decode($userId);
        $userData = UserInfoManagement::find($userId);
        $linkedInfoFirstItem = UserLinkedManagement::where('user_id',$userId)->first();
        $linkedInfo = array();
        if($linkedInfoFirstItem)
        $linkedInfo = UserLinkedManagement::where('user_id',$userId)->where('id','!=',$linkedInfoFirstItem->id)->get();
        return view('users.info',compact(['userData','linkedInfoFirstItem','linkedInfo']));
    }
    public function saveInfo(UserInfoRequest $request){
        $userId = getBase64Decode( $request->id);
        $isFile = $request->hasFile('link_avatar');
        $params = $request->all();
        $userInfo = UserInfoManagement::find($userId);
        if($isFile){
            $fileImage = $request->file('link_avatar');
            $directory = config('default.directory.images.avatar');
            $imageOriginalName = saveImageDirectory($fileImage,$directory);
            $params['link_avatar'] = $imageOriginalName;
        }
            if(isset($userInfo->id))
                $userInfo->update($params);
            else
                UserInfoManagement::create($params);

        return back()->withStatus(__('User Infomation updated.'));
    }
    public function saveLinked(Request $request){
        $userId = getBase64Decode( $request->id);
        $affiliates = $request->affiliate;
        $affiliatelinks = $request->link_affiliate;
        $linkedData = UserLinkedManagement::where('user_id',$userId)->first();
        if(isset($linkedData->id))
            UserLinkedManagement::where('user_id',$userId)->delete();
        foreach($affiliates as $key => $affiliateId){
            $affiliateData = array(
                       'user_id' => $userId,
                       'affiliate_id' => $affiliateId,
                       'affiliate_link' => $affiliatelinks[$key],
                       'record_id' => $key
            );
            UserLinkedManagement::create($affiliateData);
        }
        return response()->json(array('msg'=> 'Ok'), 200);
    }

    public function active($code){
        $id = getBase64Decode($code);
        $user = User::find($id);
        $isActive = $user->is_active;
        if($isActive)
            User::where('id',$id)->update(['is_active' => 0]);
        else
            User::where('id',$id)->update(['is_active' => 1]);

        return back()->withStatus(__('User updated.'));
    }
}
