<?php

namespace App\Http\Controllers;

use App\ContactUs;
use App\User;
use App\BU;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(User $user, BU $bu, ContactUs $contactUs){
        $bCountActive = countAllBuAppentToStatus(1);
        $waitingActive = countAllBuAppentToStatus(0);
        $usersCount = $user->count();
        $contactUsCount = $contactUs->count();
        $mapping = $bu->select('bu_latitude' , 'bu_langtuite' , 'bu_name')->get();
        $latestMembers = $user->take('8')->orderBy('id','desc')->get();
        $recentAddBuildings = $bu->take('10')->orderBy('id','desc')->get();
        $latestMessages = $contactUs->take('6')->orderBy('id','desc')->get();
        $countVilla = $bu->where('bu_type','1')->count();
        $countFlat = $bu->where('bu_type','0')->count();
        $countChalet = $bu->where('bu_type','2')->count();

        //dd($mapping);

        return view('admin.home.index',
            compact(['bCountActive','waitingActive','usersCount','contactUsCount','mapping','latestMembers',
                'recentAddBuildings','countVilla','countFlat','countChalet','latestMessages'
                ])
        );
    }
}
