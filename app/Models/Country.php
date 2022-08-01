<?php

namespace App\Models;

use App\Models\Currency;
use App\Traits\Uuid\Uuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Country extends Model
{

    use HasFactory,Uuid;

    protected $fillable = [
       'continent_code',
       'currency_code',
       'iso2_code',
       'iso3_code',
       'iso_numeric_code',
       'fips_code',
       'calling_code',
       'common_name',
       'official_name',
       'endonym',
       'demonym'
    ];


    public function ccc(){
        return $this->hasOne(Currency::class, 'iso_numeric_code');
    }
}
