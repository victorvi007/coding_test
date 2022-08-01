<?php

namespace App\Http\Controllers\Api;

use App\Repository\CountryRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repository\CurrencyRepository;

class CountryApi extends Controller
{
   public function countryApi(CountryRepository $countryRepository){

        return $countryRepository->getAllCountries();
   }

   public function CountryAllApi(CountryRepository $countryRepository){

        return $countryRepository->getFullCountry();
   }

}
