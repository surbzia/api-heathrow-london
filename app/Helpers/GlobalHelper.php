<?php

use App\Models\Location;
use Illuminate\Routing\Route;

if (!function_exists('activeNav')) {
    function activeNav($route)
    {
        return (\request()->route()->getName() == $route) ? 'active-side-nav' : '';
    }
}

if (!function_exists('image_url')) {
    function image_url($img)
    {
        return  url('storage/' . str_replace('public', '', $img));
    }
}

if (!function_exists('GetLocationPlaceId')) {
    function GetLocationPlaceId($id)
    {
        $location = Location::find($id);
        return json_decode($location->full_address[0]->place_id);
    }
}

if (!function_exists('GoogleApiKey')) {
    function GoogleApiKey()
    {
        // return '2323bgkj23h4234hl2h4hyasidfyasdfydf9a';
        return 'AIzaSyB41DRUbKWJHPxaFjMAwdrzWzbVKartNGg';
    }
}
