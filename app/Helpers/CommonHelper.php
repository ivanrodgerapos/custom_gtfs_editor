<?php
namespace App\Helpers;

use Illuminate\Support\Facades\Config;

class CommonHelper
{
    public static function responseHelper($data)
    {   
        $response = "";

        if ($data) {
            $response = ['status' => 'OK', 
                        'code' => 200, 
                        'message' => 'success', 
                        'data' => $data];    
        }

        return $response;
    }

    public static function constant ($constant) {
        return Config::get('constants.'.$constant);
    }

}