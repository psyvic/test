<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Shipment extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'reference';

    public function addresses()
    {
        return $this->hasMany(Address::class);
    }

    public function items()
    {
        return $this->hasMany(Item::class);
    }
}
