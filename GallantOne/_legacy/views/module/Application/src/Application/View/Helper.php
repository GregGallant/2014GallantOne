<?php

namespace Application\View;

use Zend\Mvc\Controller\Plugin\PostRedirectGet as PostRedirectGet;
use Zend\View\Helper\AbstractHelper;

class Helper extends AbstractHelper
{

    protected $route;

    public function __construct($route)
    {
        $this->route = $route;
    }

    public function getController()
    {
        $controller = $this->route->getParam('controller', 'index');
        //echo $controller;
        return $controller;
    }

    public function getAction()
    {
        $action = $this->route->getParam('action');
        return $action;
    }

    public function getProtected()
    {
        $acl = $this->route->getParam('acl');
        return $acl;
    }
}