<?php

namespace App\Models;

use MF\Model\Model;

class Produto extends Model
{
    private $id;
    private $produto;
    private $descricao;
    private $preco_custo;
    private $preco_venda;

    public function __get($atributo)
    {
        return $this->$atributo;
    }

    public function __set($atributo, $valor)
    {
        $this->$atributo = $valor;
    }

    public function saveProduct()
    {
        $query = "INSERT INTO produtos(
            produto,
            descricao,
            preco_custo,
            preco_venda,
            path_arquivo
        )VALUES(
            :produto,
            :descricao,
            :preco_custo,
            :preco_venda,
            :path_arquivo
        )";
        $stmt = $this->db->prepare($query);

        $stmt->bindValue(":produto", $this->__get("produto"));
        $stmt->bindValue(":descricao", $this->__get("descricao"));
        $stmt->bindValue(":preco_custo", $this->__get("preco_custo"));
        $stmt->bindValue(":preco_venda", $this->__get("preco_venda"));
        $stmt->bindValue(":path_arquivo", $this->__get("path_arquivo"));


        $stmt->execute();
        return $this;
    }

    public function getAllProducts()
    {
        $query = "SELECT id, produto, descricao, preco_custo, preco_venda, path_arquivo FROM produtos ORDER BY id DESC;";
        $stmt = $this->db->prepare($query);

        $stmt->execute();
        return $stmt->fetchall(\PDO::FETCH_ASSOC);
    }
}
