<?php

namespace App\Controllers;

use MF\Model\Container;
use MF\Controller\Action;

class IndexController extends Action
{
    public function index()
    {
        $this->render("index", "login");
    }

    public function signUp()
    {
        $this->render("signUp", "login");
    }

    public function register()
    {
        $user = Container::getModel("Usuario");

        $user->__set("nome", $_POST["nome"]);
        $user->__set("senha", $_POST["senha"]);

        if ($user->validateRegistration() === true) :
            if (count($user->getUserByNome()) == 0) :
                $user->saveUser();
                header("Location: /");
            else :
                $this->view->usuario = [
                    "nome" => $_POST["nome"],
                    "senha" => $_POST["senha"]
                ];
                $this->view->registeredError = true;
                $this->render("signUp");
            endif;
        else :
            $this->view->usuario = [
                "nome" => $_POST["nome"],
                "senha" => $_POST["senha"]
            ];
            $this->view->registrationError = true;
            $this->render("signUp");
        endif;
    }
}
