<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;

class PageController extends Controller
{
    public function index () {
        $ads = DB::table('ads')->select('*')->orderBy('id', 'desc')->get();
        $ad_photo = DB::table('ad_photo')->select('*')->get();
        return view('index', compact(['ads', 'ad_photo']));
    }

    public function ad ($id) {
        $ads = Db::table('ads')->where('id', $id)->get();
        $ad_photo = Db::table('ad_photo')->where('ad_id', $id)->get();
        return view('ad', compact(['ads', 'ad_photo']));
    }

    public function changerLocale ($locale) {
        session(['locale' => $locale]);
        App::setLocale($locale);
        return redirect()->back();
    }
}
