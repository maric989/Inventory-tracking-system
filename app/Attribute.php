<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    public function item(){
        $this->belongsTo(Product::class);
    }
}
