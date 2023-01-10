<?php

namespace App\Controllers;

use MF\Controller\Action;
use MF\Model\Model;

class AppController extends Action
{
    public function Store()
    {
        $this->render("Store");
    }
}
