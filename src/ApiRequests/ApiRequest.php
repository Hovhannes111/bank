<?php

namespace App\ApiRequests;

// use App\Helpers\Helpers;
use Dotenv\Dotenv;
use Exception;

use function App\Helpers\logger;

Dotenv::createImmutable(__DIR__.'/../../')->load();

Class ApiRequest
{
    private $url = "https://api.apilayer.com/exchangerates_data/latest?apikey=";

    private function getApiUrl() :string
    {
        $url  = $this->url . $_ENV["API_KEY"];
        return $url;
    }

    private function getDataFromApi() :array
    {
        try
        {
            $req = @json_decode(file_get_contents($this->getApiUrl()), true);
        }
        catch(Exception $e)
        {
            logger($e);
        }
        return $req;
    }

    public function getRate($currency) :float
    {
        $req = $this->getDataFromApi();
        $rate = $req['rates'][$currency];
        return $rate;
    }
}