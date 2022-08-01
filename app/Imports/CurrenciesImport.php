<?php

namespace App\Imports;

use App\Models\Country;
use App\Models\Currency;
use App\Repository\CountryRepository;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CurrenciesImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        if(isset($row['iso_code'],
        $row['iso_numeric_code'],
        $row['common_name'],
        $row['official_name'],
        $row['symbol']
        )){
            $check = Country::where('iso_numeric_code',$row['iso_numeric_code'])->first();
            // dd($check->id);
            return new Currency([
                'country_id'=>(isset($check->id))?$check->id:null,
                'iso_code'=>$row['iso_code'],
                'iso_numeric_code'=>$row['iso_numeric_code'],
                'common_name'=>$row['common_name'],
                'official_name'=>$row['official_name'],
                'symbol'=>$row['symbol'],
            ]);
        }
    }
}
