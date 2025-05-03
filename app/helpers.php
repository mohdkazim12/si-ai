<?php

    if (!function_exists('isActive')) {
        function isActive($routeNames, $activeClass = 'text-primary bg-primary/10', $inactiveClass = 'text-gray-600 hover:bg-gray-100') {
            $currentRouteName = Route::currentRouteName();
            $routeNames = is_array($routeNames) ? $routeNames : [$routeNames];
            
            return in_array($currentRouteName, $routeNames) ? $activeClass : $inactiveClass;
        }
    }

?>