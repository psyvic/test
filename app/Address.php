<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    public $timestamps = false;

    protected $hidden = [
        'id', 'shipment_reference',
    ];

    public function shipment()
    {
        return $this->belongsTo(Shipment::class);
    }
}
