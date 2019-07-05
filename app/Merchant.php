<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Merchant extends Model
{
    protected $fillable = [
        'merchantName', 'merchantAddress1', 'merchantAddress2', 'merchantCounty', 'merchantPostcode', 'merchantCountry', 'merchantPhone', 'merchantFax', 'merchantEmail', 'merchantWeb', 'lng', 'lat', 'merchantContactName', 'merchantContactEmail', 'merchantContactPhone'
    ];
}
