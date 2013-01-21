<?php

namespace Album\View;


use Zend\View\Helper\AbstractHelper;

class Helper extends AbstractHelper
{

    protected $route;

    public function __construct($route)
    {
        $this->route = $route;
    }

    public function echoController()
    {
        $controller = $this->route->getParam('controller', 'index');
        echo $controller;
    }
}