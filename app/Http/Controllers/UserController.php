<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ads;
use App\Models\Ad_photo;
use Illuminate\Support\Facades\DB;

class UserController extends Controller {
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

        return redirect('/dashboard');
    }

    public function delete($id) {
        $ad = Ads::find($id)->delete();
        $ad_photo = DB::table('ad_photo')->where('ad_id', $id)->delete();
        return redirect('/dashboard');
    }

    public function store(Request $request) {
        $this->validate($request, [
            'rent_out' => 'required',
            'number_of_rooms' => 'required',
            'price' => 'required',
            'rental_period' => 'required',
            'floor' => 'required',
            'from' => 'required',
            'total_area' => 'required',
            'residential_area' => 'required',
            'kitchen_area' => 'required',
            'city' => 'required',
            'address' => 'required',
            'photos' => 'required',
            'phone_number' => 'required',
            'ad_text' => 'required'
        ]);

        if ($request->hasFile('photos')) {
            $allowedFileExtension = ['jpg', 'jpeg', 'png'];
            $files = $request->file('photos');

            foreach ($files as $file) {
                $filename = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $check = in_array($extension, $allowedFileExtension);
            }

            if ($check) {
                $ad = Ads::create($request->all());

                foreach ($request->photos as $photo) {
                    $filename = $photo->store('photos2');
                    Ad_photo::create([
                        'ad_id' => $ad->id,
                        'filename' => $filename
                    ]);
                }

//                app('App\Http\Controllers\MailController')->send($request->owner_id);
                return redirect('/dashboard');
                echo 'Ok';
            } else {
                echo 'Error';
            }
        }
    }
}
