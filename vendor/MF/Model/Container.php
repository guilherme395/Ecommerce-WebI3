<?php

namespace MF\Model;

use App\Config\Connection\Db;

class Container
{
    public static function getModel($model)
    {
        /**
         * Instanciar classes de Create, Read, Update e Delete no momento de execução da model.
        */
          $create = new Create;
          $read = new Read;
          $update = new Update;
          $delete = new Delete;
         
        $class = "App\\Models\\" . ucfirst($model);
        return new $class(Db::getConn());
    }
}
