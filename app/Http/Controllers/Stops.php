<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Agency;

class Stops extends Controller
{
    /**
     * Generate GTFS stops.txt specification
     *
     * Controller - generates stops based on Mapbox API Reverse geocoding
     * Reference: https://docs.mapbox.com/api/search/#reverse-geocoding
     *
     * @since 05.06.2020
     *
     * @see Function/method/class relied on
     * @link baseurl/api/generate_stops
     *
     * @param Object $request Description.
     * @return type Description.
     */
    function generate_stops(Request $request) {
        try {
            $input_json = (array) json_decode(json_decode($request->input('features')));
            $features = $input_json['features'];
            $geometry = $features[0]->geometry;
            $coordinates = $geometry->coordinates;
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
