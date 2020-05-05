## About
    A custom GTFS editor / generator based on Mapbox API 

## Mapbox configuration 
    config/mapboxApi.php

## Note: After cloning and running the server, the developer may experience an Error 500 | Internal Server Error
    This is because the .env file does not exist.
    Below are the steps for generating .env file:
    1. Open terminal
    2. Go to root directory of the project
    3. run 'cp .env.example .env'
    4. run 'php artisan key:generate'

