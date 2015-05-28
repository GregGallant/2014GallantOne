<?php
class Application_Plugin_Foo extends Zend_Controller_Plugin_Abstract

{

    public function preDispatch(Zend_Controller_Request_Abstract $request)
    {
        var_dump('PreDispatchPlugin');
    }
}