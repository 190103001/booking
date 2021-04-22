<?php

namespace App\Http\Controllers;

use App\Models\Ads;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index() {
        $ads = DB::table('ads')->select('*')->get();
        $ad_photo = DB::table('ad_photo')->select('*')->get();
        return view('ads', compact(['ads', 'ad_photo']));
    }

    public function show($id) {
        $ad = DB::table('ads')->select('*')->where('id', $id)->get();
        return view('update', compact('ad'));
    }

    public function update(Request $request) {
        $ad = Ads::find($request->id);
        $ad->rent_out = $request->rent_out;
        $ad->number_of_rooms = $request->number_of_rooms;
        $ad->price = $request->price;
        $ad->rental_period = $request->rental_period;
        $ad->floor = $request->floor;
        $ad->from = $request->from;
        $ad->total_area = $request->total_area;
        $ad->residential_area = $request->residential_area;
        $ad->kitchen_area = $request->kitchen_area;
        $ad->city = $request->city;
        $ad->address = $request->address;
        $ad->phone_number = $request->phone_number;
        $ad->ad_text = $request->ad_text;

        $ad->save();

        return redirect('/admindash/ads');
    }

    public function delete($id) {
        $ad = Ads::find($id)->delete();
        $ad_photo = DB::table('ad_photo')->where('ad_id', $id)->delete();
        return redirect('/admindash/ads');
    }
}
