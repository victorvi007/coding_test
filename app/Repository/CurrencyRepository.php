<?php
namespace App\Repository;


use App\Models\Currency;


class CurrencyRepository{
    private $model;

    public function __construct(Currency $model){
        $this->model = $model;
    }

        public function getAllCurrencies(){
         return $this->model->get();
        }

}
