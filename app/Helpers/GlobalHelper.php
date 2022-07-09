<?php

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

if (!function_exists('getMapKeyScript')) {
    function getMapKeyScript()
    {
        return '2323bgkj23h4234hl2h4hyasidfyasdfydf9a';
    }
}
