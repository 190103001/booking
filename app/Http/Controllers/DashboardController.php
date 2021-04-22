<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index () {
        $user_id = Auth::user()->id;
        $my_ads = DB::table('ads')->select('*')->where('owner_id', $user_id)->orderBy('id', 'desc')->get();
        $ad_photo = DB::table('ad_photo')->select('*')->get();

        if (Auth::user()->hasRole('user')) {
            return view('dashboard', compact(['my_ads', 'ad_photo']));
        } else if (Auth::user()->hasRole('admin')) {
            return view('admindash');
        }
    }

    public function create () {
        return view('create');
    }
}
