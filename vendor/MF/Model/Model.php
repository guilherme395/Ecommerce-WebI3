<?php

namespace MF\Model;

use MF\Model\Create;
use MF\Model\Read;
use MF\Model\Update;
use MF\Model\Delete;

abstract class Model
{
    protected $db;
    protected $create;
    protected $read;
    protected $update;
    protected $delete;

    public function __construct(\PDO $db)
    {
        $this->create = new Create;
        $this->read   = new Read;
        $this->update = new Update;
        $this->delete = new Delete;
        $this->db = $db;
    }
}
