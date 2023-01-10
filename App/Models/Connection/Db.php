<?php

namespace App\Models\Connection;

class Db
{
    public static function getDb()
    {
        try {
            $conn = new \PDO("mysql:host=127.0.0.1;dbname=twetter", "root", "66586169");
            return $conn;
        } catch (\PDOException | \Throwable $e) {
            echo $e->getMessage();
        }
    }
}
