<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Priceslist_Pricebook extends Model
{
    protected $fillable = [
        'minimum_charge', 'unit_price', 'unit_id', 'job_type_id',
        'source_language_id', 'target_language_id', 'pricebook_id', 'subject_matter_id'
    ];

    protected $hidden = [
    ];

    public function pricebook()
    {
        return $this->belongsTo('App\Pricebook');
    }

    public static function find_by_properties($pricebook_id, $unit_id, $job_type_id, $source_language_id, $target_language_id, $subject_matter_id)
    {
        return array_first(DB::table('priceslist_pricebook')->select('*')
            ->where('pricebook_id', '=', $pricebook_id)
            ->where('unit_id', '=', $unit_id)
            ->where('job_type_id', '=', $job_type_id)
            ->where('source_language_id', '=', $source_language_id)
            ->where('target_language_id', '=', $target_language_id)
            ->where('subject_matter_id', '=', $subject_matter_id)
            ->get());
    }
}
