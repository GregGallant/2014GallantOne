<?php
namespace Photography;

use Photography\Entity\Photography;
use Photography\Model\PhotographyTable;
use Zend\Db\ResultSet\ResultSet;
use Zend\ModuleManager\ModuleManager;

class Module
{


    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\ClassMapAutoloader' => array(
                __DIR__ . '/autoload_classmap.php',
            ),
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }


    public function getServiceConfig()
    {
        return array(
            'factories' => array(
                'Photography\Entity\Photography' => function($sm) {
                    $pEntity = new Photography();
                    return $pEntity;
                },
            ),
        );
    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }
}