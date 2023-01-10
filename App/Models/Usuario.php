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
        $query = "INSERT INTO usuarios(nome, senha) VALUES (:nome,:senha);";

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(":nome", $this->__get("nome"));
        $stmt->bindValue(":senha", md5($this->__get("senha")));

        $stmt->execute();
        return $this;
    }

    public function Auth()
    {
        $query = "SELECT id, nome FROM usuarios WHERE nome = :nome AND senha = :senha;";

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(":nome", $this->__get("nome"));
        $stmt->bindValue(":senha", $this->__get("senha"));
        $stmt->execute();

        $user = $stmt->fetch(\PDO::FETCH_ASSOC);

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
        $query = "SELECT nome FROM usuarios WHERE nome = :nome";

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(":nome", $this->__get("nome"));
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}
