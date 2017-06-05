<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;


class Location extends Model
{

    public $timestamps = false;



    public function user()
    {

        return $this->belongsToMany('App\User','users');
    }

    public function getLocationById($locationName)
    {
        $location = DB::table('locations')->where('name', '=', $locationName)->get()->first()->id;

        return $location;
    }

    public function products(){

        return $this->belongsToMany('App\Product', 'product');
    }

}

