<?php

namespace App\Config\Connection;

class Db
{

    private static $Host = "127.0.0.1";
    private static $User = "root";
    private static $Pass = "66586169";
    private static $Dbsa = "guilherme_site";

    /** @var \PDO */
    private static $Connect = null;

    /**
     * Conecta com o banco de dados com o pattern singleton.
     * Retorna um objeto \PDO!
     */
    private static function Conectar()
    {
        try {
            if (self::$Connect == null) :
                $dsn = 'mysql:host=' . self::$Host . ';dbname=' . self::$Dbsa;
                $options = [\PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8'];
                self::$Connect = new \PDO($dsn, self::$User, self::$Pass, $options);
            endif;
        } catch (\PDOException $e) {
            echo $e->getCode(), $e->getMessage(), $e->getFile(), $e->getLine();
            die;
        }

        self::$Connect->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        return self::$Connect;
    }

    /** Retorna um objeto \PDO Singleton Pattern. */
    public static function getConn()
    {
        return self::Conectar();
    }
}
