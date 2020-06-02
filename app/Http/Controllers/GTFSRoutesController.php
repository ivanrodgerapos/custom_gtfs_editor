<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class GTFSRoutesController extends Controller
{
    function generate_stops(Request $request) {
        try {
            // geojson input
            $input_json = $request->input();
            $features = $input_json['features'];
            $coordinates = $features[0]['geometry']['coordinates'];
            $endpoint = config('mapboxApi.endpoint.geocoding');
            $stops = [];
            $index = 0;
            
            foreach ($coordinates as $stop) {
                $longitude = $stop[0];
                $latitude = $stop[1];
                $geolocation = $this->sendApiRequest($endpoint, $longitude, $latitude);
                $stops[$index] = $this->genereate_stop_data_arr($geolocation);
                $index++;
            }


            $response = ['status' => 'OK', 'code' => '200', 'data' => response()->json($stops)];
        }
        catch (Exception $e) {
            $response = ['status' => 'OK', 'code' => '200', 'data' => $e->getMessage()];
        }
        
        return json_encode($response);
    }

    private function genereate_stop_data_arr($geolocation) {
        $stop_id = $geolocation['features'][0]['id'];
        $stop_code = "";
        $stop_name = $geolocation['features'][0]['place_name'];
        $stop_desc = "";
        $stop_lat = $geolocation['query'][1];
        $stop_lon = $geolocation['query'][0];
        $zone_id = "";
        $stop_url = "";
        $location_type = 0;
        $parent_station = "";
        $stop_timezone = "";
        $wheelchair_boarding = "";

        $data = $stop_id.','.$stop_code.','.$stop_name.','.$stop_desc 
                .','.$stop_lat.','.$stop_lon.','.$zone_id.','.$stop_url 
                .','.$location_type.','.$parent_station.','.$stop_timezone
                .','.$wheelchair_boarding;
                
        return $data;
    }

    private function sendApiRequest($endpoint, $longitude, $latitude) {
        $mabox_URL = config('mapboxApi.url');
        $access_token = config('mapboxApi.access_token');
        $request_URL = $mabox_URL . $endpoint . $longitude . ',' . $latitude . '.json?access_token=' . $access_token;
        $response = Http::get($request_URL);
        return $response;
    }
}   
