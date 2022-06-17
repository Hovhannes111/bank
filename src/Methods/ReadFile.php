<?php

namespace App\Methods;

class ReadFile
{
    private $keys_array = [
        "date", 
        "user_id", 
        "role", 
        "type", 
        "money", 
        "currency", 
    ];

    private function readFile() :array
    {
        $file = explode("\n", file_get_contents('input.cvs'));
        return $file; 
    }

    public function getFileData() :array
    {
        $file = $this->readFile();
        $fileData = [];
        
        foreach($file as $data)
        {
            $values_array = explode(",", $data);
            $obj = (object) array_combine( $this->keys_array, $values_array );
            $fileData[] = $obj;
        }
        
        return $fileData;
    }
}