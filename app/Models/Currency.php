<?php

namespace App\Models;

use App\Models\Country;
use App\Traits\Uuid\Uuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Currency extends Model
{
    use HasFactory,Uuid;

    protected $fillable = [
        'country_id',
        'iso_code',
        'iso_numeric_code',
        'common_name',
        'official_name',
        'symbol'
     ];


    public function xxx(){
        return $this->belongsTo(Country::class, 'iso_numeric_code');
    }
}
