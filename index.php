<?php

require("vendor/autoload.php");

use App\Methods\ReadFile;

use function App\Helpers\getWeekStartDay;
use function App\Helpers\percentageNumber;
use function App\Helpers\roundedCommission;

class Index
{
    private $file;
    
    public function __construct()
    {
        $this->file = new ReadFile();
    }

    private function getCommisionPercent($data)
    {
        $percent = 0;
        foreach($data as $key => $elem) {

            if($elem->type !== "deposit")
            {
                if($elem->role == "private")
                {

                    if($elem->currency !== "EUR")
                    {
                        $rate = roundedCommission($elem->currency);
                        $money = round($elem->money * $rate, 2);
                    } 
                    else {
                        $money = round($elem->money, 2);
                    }

                    $percent = ($money >= 1000) ? 0.3 : 0;
                    
                    // if (
                    //     $data[$key]->user_id == $data[$key + 1]->user_id  &&
                    //     getWeekStartDay($data[$key]->date) == getWeekStartDay($data[$key + 1]->date)
                    // ) {
                    //     $money   = $data[$key]->money + $data[$key + 1]->money;
                    // }

                }
                else {
                    $percent = 0.5;
                }
            }
            else {
                $percent = 0.03;
            }
            
            $elem->percent = $percent;

            $amount = percentageNumber($elem->money, $elem->percent);
            
            echo "<pre>";
            var_dump($amount);
        }
    }

    private function getData() 
    {
        $data = $this->file->getFileData();
        $this->getCommisionPercent($data);
    }

    public function exec()
    {
        $this->getData(); 
    }

}

$x = new Index();
$x->exec();