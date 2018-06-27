<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pricebook extends Model
{
    protected $fillable = [
        'name', 'currency_id',
    ];

    protected $hidden = [
    ];

    /*
    return $this->hasMany('App\Course', 'added_by');
    return array_first(DB::table('students')->select('*')->where('user_id', '=', Auth::id())->get());
    return $this->belongsTo('App\User', 'added_by');
    */

    public function currency()
    {
        return $this->belongsTo('App\Currency');
    }

    public function productlines()
    {
        return $this->hasMany('App\Productline');
    }

    public function priceslist()
    {
        return $this->hasMany('App\Priceslist_Pricebook');
    }

}
