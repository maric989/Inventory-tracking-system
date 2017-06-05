<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $sortable = [
        'name',
        'type',
        'user_id',
        'date_of_purchase',
        'warranty',
        'created_at',
        'updated_at'
    ];

    protected $dates = ['warranty', 'date_of_purchase'];

    public function location()
    {
        return $this->belongsTo('App\Location', 'location_id','id');
    }
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id','id');
    }

    public function attribute()
    {
        $this->hasMany(Attribute::class);
    }

    public function notes()
    {
        $this->hasMany(Notes::class);
    }
}
