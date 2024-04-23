<?php

namespace App\Services;

class RouteService
{
    public static function activeClass($request, $routename)
    {
        return $request->route()->named($routename) ? 'active' : '';
    }

    public static function serviceWidgetClass($request_servcice_id, $widget_service_id)
    {
        return $request_servcice_id == $widget_service_id ? 'active' : '';
    }
}
