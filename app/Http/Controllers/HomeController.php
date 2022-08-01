<?php

namespace App\Http\Controllers;

use App\Repository\CountryRepository;
use Illuminate\Http\Request;
use App\Imports\CountriesImport;
use App\Http\Requests\CsvRequest;
use App\Imports\CurrenciesImport;
use App\Repository\CurrencyRepository;
use Maatwebsite\Excel\Facades\Excel;

class HomeController extends Controller
{
   public function homeShow(CountryRepository $countryRepository,CurrencyRepository $currencyRepository){

       return view('home');
   }



   public function showData(CountryRepository $countryRepository){
       $countries = $countryRepository->getAllCountries();
    return view('data',compact('countries'));
   }

   public function uploadFile(CsvRequest $request){
        if($request->form == 'country'){

             $upload = Excel::import(new CountriesImport,$request->file);
        }else{

            $upload = Excel::import(new CurrenciesImport,$request->file);
        }
     if($upload){
        return redirect()->back()->with('message', 'upload Sucessful');
     }else{
        return redirect()->back()->with('message', 'An error Occured');
     }
   }
}
