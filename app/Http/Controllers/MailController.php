<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\DemoEmail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function send($owner_id) {
        $user = DB::table('users')->where('id', $owner_id)->get();
        $objDemo = new \stdClass();
        $objDemo->sender = 'Booking';
        $objDemo->receiver = $user[0]->name;

        Mail::to($user[0]->email)->send(new DemoEmail($objDemo));
    }
}
