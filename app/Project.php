<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Project extends Model
{
    protected $fillable = [
        'name', 'start_date', 'end_date', 'po_number', 'is_invoiced', 'productline_id',
    ];

    protected $hidden = [
    ];

    public function customer()
    {
        return array_first(DB::table('customers')->select('*')->where('id', '=', $this->productline->customer_id)->get());
    }

    public function productline()
    {
        return $this->belongsTo('App\Productline');
    }


}
