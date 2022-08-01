<?php
namespace App\Repository;

use App\Models\Country;


class CountryRepository{
    private $model;

    public function __construct(Country $model){
        $this->model = $model;
    }

    public function checkifCountryExist($data){
      return  $this->model->where('iso_numeric_code',$data);
    }

        public function getAllCountries(){
         $data =  $this->model->paginate(20)->all();
         return response()->json($data);
        }
        public function getFullCountry(){
         return $this->model->all();
        }

}
