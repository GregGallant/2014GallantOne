<?php
namespace Portfolio;

use Portfolio\Entity\Portfolio;
use Portfolio\Model\PortfolioTable;
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
        /*
        return array(
            'factories' => array(
                'Portfolio\Model\PortfolioEntity' => function($sm) {
                    $pEntity = new PortfolioEntity();
                    return $pEntity;
                },
            ),
        );
            */
    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }
}