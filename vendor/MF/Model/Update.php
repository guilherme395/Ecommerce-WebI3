<?php

namespace MF\Model;

use App\Config\Connection\Db;

class Update extends Db
{

    private $Tabela;
    private $Dados;
    private $Termos;
    private $Places;
    private $Result;


    private $Update;

    private $Conn;

    public function ExeUpdate($Tabela, array $Dados, $Termos, $ParseString)
    {
        $this->Tabela = (string) $Tabela;
        $this->Dados = $Dados;
        $this->Termos = (string) $Termos;

        parse_str($ParseString, $this->Places);
        $this->getSyntax();
        $this->Execute();
    }

    public function getResult()
    {
        return $this->Result;
    }

    public function getRowCount()
    {
        return $this->Update->rowCount();
    }

    public function setPlaces($ParseString)
    {
        parse_str($ParseString, $this->Places);
        $this->getSyntax();
        $this->Execute();
    }

    /**
     * ****************************************
     * *********** PRIVATE METHODS ************
     * ****************************************
     */

    //Obtém o PDO e Prepara a query
    private function Connect()
    {
        $this->Conn = parent::getConn();
        $this->Update = $this->Conn->prepare($this->Update);
    }

    //Cria a sintaxe da query para Prepared Statements
    private function getSyntax()
    {
        foreach ($this->Dados as $Key => $Value) :
            $Places[] = $Key . ' = :' . $Key;
        endforeach;

        $Places = implode(', ', $Places);
        $this->Update = "UPDATE {$this->Tabela} SET {$Places} {$this->Termos}";
    }

    //Obtém a Conexão e a Syntax, executa a query!
    private function Execute()
    {
        $this->Connect();
        try {
            $this->Update->execute(array_merge($this->Dados, $this->Places));
            $this->Result = true;
        } catch (\PDOException $e) {
            $this->Result = null;
            echo "<b>Erro ao Ler:</b> {$e->getMessage()}", $e->getCode();
        }
    }
}
