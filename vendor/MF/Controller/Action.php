<?php

namespace MF\Controller;

abstract class Action
{
    protected $load;

    public function __construct()
    {
        $this->load = new \stdClass();
    }

    protected function render($load, $layout = "default")
    {
        $this->load->page = $load;

        if (file_exists("../App/Views/Layouts/{$layout}.phtml")) :
            require_once "../App/Views/Layouts/{$layout}.phtml";
        endif;
    }

    protected function content()
    {
        $classAtual = get_class($this);
        $classAtual = str_replace("App\\Controllers\\", "", $classAtual);
        $classAtual = strtolower(str_replace("Controller", "", $classAtual));
        require_once "../App/Views/{$classAtual}/{$this->load->page}.phtml";
    }
}
