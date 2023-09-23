<?php

use Illuminate\Support\Facades\Route;

if (!function_exists('set_active_route')) {
    function set_active_route($route)
    {
        return request()->routeIs($route) ? 'active' : '';
    }
}
