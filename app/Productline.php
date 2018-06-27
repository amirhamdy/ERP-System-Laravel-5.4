<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Productline extends Model
{
    protected $fillable = [
        'name', 'customer_id', 'pricebook_id',
    ];

    protected $hidden = [
    ];

    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }

    public function pricebook()
    {
        return $this->belongsTo('App\Pricebook');
    }

}
