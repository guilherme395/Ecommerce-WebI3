<?php

namespace App\Controllers;

use MF\Model\Container;
use MF\Controller\Action;

class IndexController extends Action
{
    public function index()
    {
        $this->view->login = isset($_GET["auth"]) ? $_GET["auth"] : "";
        $this->render("index");
    }

    public function singUp()
    {
        $this->render("singUp");
    }

    public function register()
    {
        $data = $_POST;

        echo "<pre>";
        print_r($data);
        echo "</pre>";
    }
}
