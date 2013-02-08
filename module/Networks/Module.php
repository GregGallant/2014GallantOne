<?php
namespace Networks;

use Networks\Entity\Networks;
use Networks\Model\NetworksTable;
use Zend\Db\ResultSet\ResultSet;
use Networks\NetworkAdapterFactory;
use DoctrineORMModule\Service\EntityManagerFactory;
use DoctrineORMModule\Service\DBALConnectionFactory;
use DoctrineORMModule\Service\ConfigurationFactory;
use DoctrineModule\Service\DriverFactory;
use DoctrineORMModule\Service\EntityResolverFactory;
use Zend\Form\Annotation\AnnotationBuilder;
use Zend\ServiceManager\ServiceLocatorInterface;

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
                'Networks\Entity\Networks' => function($sm) {
                    $nEntity = new Networks();
                    return $nEntity;
                },

                'gmAdapter' => new NetworkAdapterFactory('dbgm'),
                //'doctrine.entitymanager.orm_gallantmedia' => new EntityManagerFactory("orm_gallantmedia"),
                /*
                'doctrine.entitymanager.orm_gallantmedia' => new NetworkAdapterFactory("doctrine"),
                'doctrine.connection.orm_gallantmedia' => new DBALConnectionFactory("orm_gallantmedia"),
                'doctrine.configuration.orm_gallantmedia' => new ConfigurationFactory("orm_gallantmedia"),
                'doctrine.driver.orm_gallantmedia' => new DriverFactory('orm_gallantmedia'),
                'doctrine.entity_resolver.orm_gallantmedia' => new EntityResolverFactory('orm_gallantmedia'),

                'DoctrineORMModule\Form\Annotation\AnnotationBuilder' => function(ServiceLocatorInterface $sl) {
                    return new AnnotationBuilder($sl->get('doctrine.entitymanager.orm_gallantmedia'));
                },
                */

            ),

        );
    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }
}