<?php

namespace MF\Model;

abstract class BootstrapModel
{
    protected $create;
    protected $read;
    protected $update;
    protected $delete;

    public function __construct()
    {
        $this->create = new Create;
        $this->read   = new Read;
        $this->update = new Update;
        $this->delete = new Delete;
    }
}
