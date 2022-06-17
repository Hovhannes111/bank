<?php

use App\Helpers\Helpers;
use PHPUnit\Framework\TestCase;

class RateTest extends TestCase
{
    // private $url = "https://api.apilayer.com/exchangerates_data/latest?apikey=";

    // private function getApiUrl() :string
    // {
    //     $url  = $this->url . $_ENV["API_KEY"];
    //     return $url;
    // }

    // /**
    //  * @test
    //  */
    // public function testDataFromApi() :array
    // {
    //     $req = @json_decode(file_get_contents($this->getApiUrl()), true);
    //     $this->assertNotEmpty($req);
    //     return $req;
    // }

    // /**
    //  * @test
    //  * @depends testDataFromApi
    //  */
    // public function testCheckRates($req) :array
    // {
    //     $this->assertArrayHasKey("rates", $req);
    //     return $req["rates"];
    // }

    //  /**
    //  * @test
    //  * @depends testCheckRates
    //  */
    // public function testCheckRateResults($rates) :void
    // {
    //     $this->assertArrayHasKey("EUR", $rates);
    // }
}