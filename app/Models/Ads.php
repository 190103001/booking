<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ads extends Model
{
    use HasFactory;

    protected $table = 'ads';

    protected $fillable = [
        'owner_id',
        'rent_out',
        'number_of_rooms',
        'price',
        'rental_period',
        'floor',
        'from',
        'total_area',
        'residential_area',
        'kitchen_area',
        'city',
        'address',
        'phone_number',
        'ad_text'
    ];

//    public function user() {
//        return $this->belongsTo('App/User');
//    }
}
