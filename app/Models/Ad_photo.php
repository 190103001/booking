<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ad_photo extends Model
{
    use HasFactory;

    protected $table = 'ad_photo';
    protected $fillable = ['ad_id', 'filename'];

//    public function item() {
//        return $this->belongsTo('App/Ads');
//    }
}
