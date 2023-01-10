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
        $routes["home"] = array(
            "route" => "/",
            "controller" => "indexController",
            "action" => "index"
        );

        $this->setRoutes($routes);
    }
}
