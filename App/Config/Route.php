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
        $routes["Login"] = array(
            "route" => "/",
            "controller" => "indexController",
            "action" => "index"
        );

        $routes["SignUp"] = array(
            "route" => "/signUp",
            "controller" => "indexController",
            "action" => "signUp"
        );

        $routes["Register"] = array(
            "route" => "/register",
            "controller" => "indexController",
            "action" => "register"
        );

        /**
         * AuthController Routes
         */
        $routes["Auth"] = array(
            "route" => "/auth",
            "controller" => "AuthController",
            "action" => "Auth"
        );

        /**
         * AppController Routes
         */
        $routes["Store"] = array(
            "route" => "/store",
            "controller" => "AppController",
            "action" => "Store"
        );

        $this->setRoutes($routes);
    }
}
