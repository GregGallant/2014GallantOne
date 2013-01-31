<?php
namespace Clients;

//use Clients\Entity\Clients;
//use Clients\Model\ClientsTable;
use Zend\Db\ResultSet\ResultSet;

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
        /*return array(
            'factories' => array(
                'Clients\Entity\Clients' => function($sm) {
                    $pEntity = new Clients();
                    return $pEntity;
                },
            ),
        );*/
    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }
}