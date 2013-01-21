<?php

namespace Auth;


class Module
{

    /* PreDispatching */
    public function onBootstrap( $e )
    {
        $eventManager = $e->getApplication()->getEventManager();
        $eventManager->attach( \Zend\Mvc\MvcEvent::EVENT_DISPATCH, array($this, 'preDispatch'), 100 );
    }

    public function preDispatch()
    {
        //var_dump("Shiza");
        /* ACL Stuff here */
    }

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
                /*
                'authenticationadapter' => array(
                    'odm_default' => array(
                        'objectManager' => 'Doctrine\Common\Persistence\ObjectManager',
                        //'objectManager' => 'doctrine.documentmanager.odm_default',
                        'identityClass' => 'Auth\Entity\User',
                        'identityProperty' => 'email',
                        'credentialProperty' => 'password',
                        'credentialCallable' => 'Auth\Entity\User::hashPassword'
                    ),
                ),
                */
            ),
        );
    }
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }
}

