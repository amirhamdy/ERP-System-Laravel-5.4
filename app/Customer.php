<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class Customer extends Authenticatable
{
    use Notifiable;

    use EntrustUserTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'fax', 'status', 'city', 'address1', 'address2', 'postal_code', 'billing_address', 'website', 'rating', 'region_id',
        'country_id', 'industry_id', 'created_by', 'updated_by',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];

    public function industry()
    {
        return $this->belongsTo('App\Industry');
    }

    public function region()
    {
        return $this->belongsTo('App\Region');
    }

    public function country()
    {
        return $this->belongsTo('App\Country');
    }
}
