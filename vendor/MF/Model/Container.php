<?php

namespace MF\Model;

use App\Config\Connection\Db;



class Container
{
    public static function getModel($model)
    {
        $class = "App\\Models\\" . ucfirst($model);
        return new $class(Db::getConn());
    }
}
