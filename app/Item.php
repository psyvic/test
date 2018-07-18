<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    public $timestamps = false;

    protected $hidden = [
        'id'
    ];

    public function shipment()
    {
        return $this->belongsTo(Shipment::class);
    }


}
