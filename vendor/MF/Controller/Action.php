<?php

namespace MF\Controller;

abstract class Action
{
    protected $view;

    public function __construct()
    {
        $this->view = new \stdClass();
    }

    protected function render($view, $layout = "default")
    {
        $this->view->page = $view;

        if (file_exists("../App/Views/Layouts/{$layout}.phtml")) :
            require_once "../App/Views/Layouts/{$layout}.phtml";
        endif;
    }

    protected function content()
    {
        $classAtual = get_class($this);
        $classAtual = str_replace("App\\Controllers\\", "", $classAtual);
        $classAtual = strtolower(str_replace("Controller", "", $classAtual));
        require_once "../App/Views/{$classAtual}/{$this->view->page}.phtml";
    }
}
