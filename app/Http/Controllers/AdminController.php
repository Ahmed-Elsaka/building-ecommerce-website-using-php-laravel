<?php

namespace App\Http\Controllers;

use App\ContactUs;
use App\User;
use App\BU;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(User $user, Bu $bu, ContactUs $contactUs){
        $bCountActive = countAllBuAppentToStatus(1);
        $waitingActive = countAllBuAppentToStatus(0);
        $usersCount = $user->count();
        $contactUsCount = $contactUs->count();

        return view('admin.home.index',
            compact(['bCountActive','waitingActive','usersCount','contactUsCount'])
        );
    }
}
