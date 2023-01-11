<?php

namespace App\Controllers;

use MF\Model\Container;
use MF\Controller\Action;

class AppController extends Action
{
    public function validateSession()
    {
        session_start();
        if (!isset($_SESSION["id"]) || empty($_SESSION["id"]) || !isset($_SESSION["nome"]) || empty($_SESSION["nome"])) :
            header("Location: /?auth=authenticationFailed");
        endif;
    }

    public function Store()
    {
        $this->validateSession();
        $product = Container::getModel("Produto");
        $this->load->products = $product->getAllProducts();
        $this->render("Store");
    }

    public function productRegistration()
    {
        $this->validateSession();

        $product = Container::getModel("Produto");
        $product->__set("produto", $_POST["Produto"]);
        $product->__set("descricao", $_POST["Descricao"]);
        $product->__set("preco_custo", $_POST["Preco_Custo"]);
        $product->__set("preco_venda", $_POST["Preco_Venda"]);

        preg_match("/\.(png|jpg|jpeg){1}$/i", $_FILES["Arquivo"]["name"], $ext);
        if ($ext) :
            $nomeArchive = md5(uniqid(time())) . "." . $ext[1];
            $pathArchive = "Uploads/" . $nomeArchive;
            move_uploaded_file($_FILES["Arquivo"]["tmp_name"], $pathArchive);

            $product->__set("path_arquivo", $pathArchive);
            $product->saveProduct();
            header("Location: /store?insertedProduct=true");
        else :
            header("Location: /store?ext=failed");
        endif;
    }

    public function productList()
    {
        $this->validateSession();
        $product = Container::getModel("Produto");
        $this->load->products = $product->getAllProducts();
        $this->render("productList");
    }
}
