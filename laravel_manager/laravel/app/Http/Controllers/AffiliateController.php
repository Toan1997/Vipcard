<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers;
use App\Models\VipcardAffiliate;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\AffiliateRequest;

class AffiliateController extends Controller
{
    public function index(){
        $affiliates =  VipcardAffiliate::paginate(10);
        return view('affiliate.index',compact('affiliates'));
    }

    public function create(){
        return view('affiliate.edit');
    }

    public function edit($id = null){
        $affiliate =  VipcardAffiliate::find($id);
        return view('affiliate.edit',compact('affiliate'));
    }

    public function save(AffiliateRequest $request)
    {
        $id = $request->id;
        $isFile = $request->hasFile('affiliate_icon');
        $params = $request->all();
        if($isFile){
            $fileImage = $request->file('affiliate_icon');
            $directory =  config('default.directory.images.affiliate');
            $imageOriginalName = saveImageDirectory($fileImage,$directory);
            $params['affiliate_icon'] = $imageOriginalName;
        }
        if($id){
            $affiliate = VipcardAffiliate::find($id);
            $affiliate->update($params);
        }
        else
            VipcardAffiliate::create($params);

        return redirect('/affiliate')->withStatus(__('Create Affiliate Successfully.'));
    }

    public function delete($id){
        VipcardAffiliate::find($id)->delete();
        return back();
    }
}
