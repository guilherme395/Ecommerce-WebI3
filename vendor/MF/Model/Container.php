<?php

namespace MF\Model;

use App\Models\Connection\Db;

class Container
{
    public static function getModel($model)
    {
        $class = "App\\Models\\" . ucfirst($model);
        $conn = Db::getDb();
        
        return new $class($conn);
    }
}
