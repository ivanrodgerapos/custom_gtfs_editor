<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Mapbox API configuration
    |--------------------------------------------------------------------------
    | Set Access tokens endpoints and URIs
    |
    */

    'url' => 'https://api.mapbox.com/',
    'access_token' => 'pk.eyJ1IjoiYm9zY2Fmc29mdHdhcmUiLCJhIjoiY2p4aXl1d2QyMDBqdDN0cXJubTBlZHI2dyJ9.9SInC8Ak_dNOUvC7scfOEQ',

    /* Reverse geocoding */
    'endpoint' => [
        'geocoding' => 'geocoding/v5/mapbox.places/'
    ]

];
