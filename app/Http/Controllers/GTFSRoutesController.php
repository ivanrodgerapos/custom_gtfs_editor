<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class GTFSRoutesController extends Controller
{
    function generate_stops(Request $request) {
        $input_json = $request->input('features');
        $input_json = $input_json[0]['geometry']['coordinates'];
        $endpoint = config('mapboxApi.endpoint.geocoding');
        $stops = [];
        $index = 0;
        foreach ($input_json as $stop) {
            $longitude = $stop[0];
            $latitude = $stop[1];
            $geolocation = $this->sendApiRequest($endpoint, $longitude, $latitude);
            $stops[$index] = $this->genereate_stop_data_arr($geolocation);
            $index++;
        }
        return response()->json($stops);
    }

    private function genereate_stop_data_arr($geolocation) {
        $data = [];
        $data['stop_id'] = $geolocation['features'][0]['id'];
        $data['stop_code'] = "";
        $data['stop_name'] = $geolocation['features'][0]['place_name'];
        $data['stop_desc'] = "";
        $data['stop_lat'] = $geolocation['query'][1];
        $data['stop_lon'] = $geolocation['query'][0];
        $data['zone_id'] = "";
        $data['stop_url'] = "";
        $data['location_type'] = 0;
        $data['parent_station'] = "";
        $data['stop_timezone'] = "";
        $data['wheelchair_boarding'] = "";
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
