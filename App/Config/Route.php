<?php

namespace App\Config;

use MF\Init\Bootstrap;

class Route extends Bootstrap
{
    protected function initRoutes()
    {
        /**
         * IndexController Routes
         */
        $routes["login"] = array(
            "route" => "/",
            "controller" => "indexController",
            "action" => "index"
        );

        $routes["singUp"] = array(
            "route" => "/singUp",
            "controller" => "indexController",
            "action" => "singUp"
        );

        $routes["register"] = array(
            "route" => "/register",
            "controller" => "indexController",
            "action" => "register"
        );

        $this->setRoutes($routes);
    }
}
