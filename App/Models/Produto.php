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
        $cadProduct["produto"]      = $this->__get("produto");
        $cadProduct["descricao"]    = $this->__get("descricao");
        $cadProduct["preco_custo"]  = $this->__get("preco_custo");
        $cadProduct["preco_venda"]  = $this->__get("preco_venda");
        $cadProduct["path_arquivo"] = $this->__get("path_arquivo");

        $this->create->ExeCreate("produtos", $cadProduct);
        return $this;
    }

    public function getAllProducts()
    {
        $this->read->ExeRead("produtos", "ORDER BY id DESC");

        if ($this->read->getResult()) :
            return $this->read->getResult();
        endif;
    }
}
