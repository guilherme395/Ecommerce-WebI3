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
}
