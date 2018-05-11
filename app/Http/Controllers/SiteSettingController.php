<?php

namespace App\Http\Controllers;

use App\Http\Middleware\RedirectIfAuthenticated;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\SiteSetting;
use  App\Http\Requests\AddUserRequestAdmin;
use Illuminate\Support\Facades\Redirect;
use Yajra\DataTables\Contracts\DataTable;
use DataTables;

class SiteSettingController extends Controller
{
    public function index(SiteSetting $siteSetting){
        $siteSetting = $siteSetting->all();
        return view('admin.sitesetting.index',compact('siteSetting'));
    }

    public function store(Request $request, SiteSetting $siteSetting){
        foreach (array_except($request->toArray(),['_token','submit']) as $key=> $req){
         //   $siteSettingUpdate = $siteSetting->where('namesetting', $key)->first();
            $siteSettingUpdate = $siteSetting->where('namesetting', $key)->get()[0];
            if($siteSettingUpdate->type !=3){
                $siteSettingUpdate->fill(['value' => $req ])->save();
            }else{
                $fileName = uploadImage($req, 'public/website/slider/', 1600, 500 ,$siteSettingUpdate->value);
                if($fileName){
                    $siteSettingUpdate->fill(['value' => $fileName ])->save();
                }
            }

        }
        return Redirect::back()->withFlashMessage('Site Settings have been edited successfully');
    }

}
