<?php

namespace Auth;

/* ACL Stuff*/
use Zend\Permissions\Acl\Acl;
use Zend\Permissions\Acl\Role\GenericRole as Role;
use Zend\Permissions\Acl\Resource\GenericResource as Resource;
use Album\View\Helper as MyViewHelper;

class Module
{

    protected $ev;

    /* PreDispatching */
    public function onBootstrap( $e )
    {
        $this->ev = $e;
        /*
        $eventManager = $e->getApplication()->getEventManager();
        $eventManager->attach( \Zend\Mvc\MvcEvent::EVENT_DISPATCH, array($this, 'preDispatch'), 100 );
        */
        //var_dump($eventManager->getEvents());

        $app = $e->getApplication();
        $serviceManager = $app->getServiceManager();

        $serviceManager->get('viewhelpermanager')->setFactory('myviewalias', function($sm) use ($e) {
            return new MyViewHelper($e->getRouteMatch());
        });

        $eventManager = $e->getApplication()->getEventManager();
        $eventManager->attach( \Zend\Mvc\MvcEvent::EVENT_DISPATCH, array($this, 'preDispatch'), 100 );
        //var_dump($eventManager->getEvents());

    }

    public function preDispatch()
    {
        //var_dump("Shiza");
        /* ACL Stuff here */

        $mvh = new MyViewHelper($this->ev->getRouteMatch());
        var_dump($mvh->getProtected());
        //var_dump(new MyViewHelper($this->ev->getRouteMatch())->myviewalias()->echoController());

        $resource = $mvh->getController();
        $action = $mvh->getAction();

        $acl = new Acl();

        $acl->addRole(new Role('guest'));
        $acl->addRole(new Role('member'), 'guest');
        $acl->addRole(new Role('admin'));

        $parents = array('guest', 'member', 'admin');
        $databaseUserLevel = array('member');

        $acl->addRole(new Role('dudeskiSession'), $databaseUserLevel);

        $acl->addResource(new Resource($resource));
        $acl->addResource(new Resource($action), $resource);


        $acl->allow('dudeskiSession', array($resource), array($action));

        //PSUEDOCODE
        /*
         *  Make a list of all protected controllers (modules)
         *  Make a sublist of all protected actions of public controllers
         *  Parse list into conditions
         *  Read from database
         */

        $acl->deny(null, $resource);

        if ($resource != 'Album\Controller\Album')
        {
            $acl->allow('guest', $resource);
        } else {
            /* All protected content */

            // check protected modules

            // check protected indexes

            $acl->allow('guest', $resource);
            //$acl->deny('guest', $resource);
        }

        /* This is just testing */
/*
        if ($resource == 'Application\Controller\Index' || $resource == 'Portfolio\Controller\Portfolio')
        {
            $acl->allow('guest', $resource);
        } else if ($resource == 'Album\Controller\Album') {
            if($action == 'index') {
                $acl->allow('guest', $resource);
            } else if($action == 'delete') {
                $acl->deny('member', $resource);
            } else {
                $acl->allow('member', $resource);
                $acl->deny('guest', $resource);
            }
            //$acl->deny('guest', null, array('edit', 'add', 'delete'));
            //$acl->allow('guest', null, 'index');
        } else {
            $acl->deny('guest', $resource);
        }
*/
        //$acl->allow('member', $resource);
        $acl->allow('admin', $resource);

        /* Login acl */
        if ($acl->isAllowed('dudeskiSession', $resource)) {
            return;
        }

        if ($resource != 'Auth\Controller\Auth') {
            $response = $this->ev->getResponse();
            $response->setHeaders( $response->getHeaders()->addHeaderLine('Location', '/login') );
            $response->setStatusCode(302);
            $response->sendHeaders();
            exit();
        }

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

