<?php

namespace App\Controllers;

use MF\Model\Container;
use MF\Controller\Action;

class AuthController extends Action
{
    public function Auth()
    {
        $user = Container::getModel("Usuario");

        $user->__set("nome", $_POST["nome"]);
        $user->__set("senha", md5($_POST["senha"]));
        $user->auth();

        if (!empty($user->__get("id"))) :
            session_start();
            
            $_SESSION["id"] = $user->__get("id");
            $_SESSION["nome"] = $user->__get("nome");

            header("Location: /store");
        else :
            header("Location: /?auth=authenticationFailed");
        endif;
    }
}
