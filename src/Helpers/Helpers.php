<?php

namespace App\Helpers;

use Exception;
use App\ApiRequests\ApiRequest;

function roundedCommission($currency) :float
{
    // $apiRequest = new ApiRequest();
    // $rate = $apiRequest->getRate($currency);
        
    $rate = 129.53; // for testing
    return $rate;

}

function getWeekStartDay($date) :string
{
    $custom_date = strtotime( date('Y-m-d', strtotime($date)) ); 
    $week_start = date('Y-m-d', strtotime('this week last monday', $custom_date));
    return $week_start;
}


function percentageNumber($price, $percent) :float
{
    return round(($price / 100) * $percent, 2);
}

function logger($error)
{
    $log  = $error.PHP_EOL;
    file_put_contents('./logs/Errors.log', $log, FILE_APPEND);
    throw new Exception($error);
}