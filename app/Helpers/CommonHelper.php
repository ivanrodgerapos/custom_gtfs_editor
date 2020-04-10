<?php
namespace App\Helpers;

class CommonHelper
{
    public function responseHelper($data)
    {   
        $response = "";

        if ($data) {
            $response = ['status' => 'OK', 'code' => 200, 'data' => $data];    
        }

        return $response;
    }

    public static function instance()
     {
         return new CommonHelper();
     }
}