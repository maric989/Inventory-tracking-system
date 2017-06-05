<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;


class Notes extends Model
{
    public function product(){
        $this->belongsTo(Product::class);
    }
}
