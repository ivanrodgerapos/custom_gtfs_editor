<?php
namespace App\Helpers;

class CommonHelper
{
    public static function responseHelper($data)
    {   
        $response = "";

        if ($data) {
            $response = ['status' => 'OK', 'code' => 200, 'data' => $data];    
        }

        return $response;
    }

}