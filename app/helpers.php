<?php

if(!function_exists('translate_route')) {
    function translate_route($route)
    {
        return trans($route, [], app()->getLocale());
    }
}

if(!function_exists('set_translated_route')) {
    function set_translated_route()
    {
        app()->setLocale(request()->segment(1));
    }
}
