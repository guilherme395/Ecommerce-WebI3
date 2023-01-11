<?php

namespace App\Models;

use MF\Model\Model;

class Usuario extends Model
{
    private $id;
    private $nome;
    private $senha;

    public function __get($atributo)
    {
        return $this->$atributo;
    }

    public function __set($atributo, $valor)
    {
        $this->$atributo = $valor;
    }

    public function saveUser()
    {
        $cadUser["nome"]  = $this->__get("nome");
        $cadUser["senha"] = $this->__get("senha");

        $this->create->ExeCreate("usuarios", $cadUser);
        return $this;
    }

    public function Auth()
    {
        $this->read->ExeRead("usuarios", "WHERE nome = :nome AND senha = :senha;", "nome={$this->__get("nome")}&senha={$this->__get("senha")}");
        $user = $this->read->getResult()[0];

        if (isset($user["id"])) :
            $this->__set("id", $user["id"]);
        endif;
        return $this;
    }

    public function validateRegistration()
    {
        if (strlen($this->__get("nome")) < 5 || strlen($this->__get("senha")) < 5) :
            $valid = false;
        else :
            $valid = true;
        endif;
        return $valid;
    }

    public function getUserByNome()
    {
        $this->read->ExeRead("usuarios", "WHERE nome = :nome;", "nome={$this->__get("nome")}");
        return $this->read->getResult()[0];
    }
}
