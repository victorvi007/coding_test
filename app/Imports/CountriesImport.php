<?php

namespace App\Imports;

use App\Models\Country;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CountriesImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {



        if(isset(
        $row['continent_code'],
        $row['currency_code'],
        $row['iso2_code'],
        $row['iso3_code'],
        $row['iso_numeric_code'],
        $row['fips_code'],
        $row['calling_code'],
        $row['common_name'],
        $row['official_name'],
        $row['endonym'],
        $row['demonym']
        )){


            return new Country([
                'continent_code'=>$row['continent_code'],
                'currency_code'=>$row['currency_code'],
                'iso2_code'=>$row['iso2_code'],
                'iso3_code'=>$row['iso3_code'],
                'iso_numeric_code'=>$row['iso_numeric_code'],
                'fips_code'=>$row['fips_code'],
                'calling_code'=>$row['calling_code'],
                'common_name'=>$row['common_name'],
                'official_name'=>$row['official_name'],
                'endonym'=>$row['endonym'],
                'demonym'=>$row['demonym'],

            ]);
        }

    }
}
