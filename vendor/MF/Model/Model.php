<?php

namespace MF\Model;

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
