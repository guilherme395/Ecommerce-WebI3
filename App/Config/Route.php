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

        $routes["Leave"] = array(
            "route" => "/leave",
            "controller" => "AuthController",
            "action" => "Leave"
        );

        /**
         * AppController Routes
         */
        $routes["Store"] = array(
            "route" => "/store",
            "controller" => "AppController",
            "action" => "Store"
        );

        $routes["productRegistration"] = array(
            "route" => "/productRegistration",
            "controller" => "AppController",
            "action" => "productRegistration"
        );

        $this->setRoutes($routes);
    }
}
