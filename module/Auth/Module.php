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
        var_dump($mvh->echoController());
        //var_dump(new MyViewHelper($this->ev->getRouteMatch())->myviewalias()->echoController());

        $resource = $mvh->echoController();
        $acl = new Acl();

        $acl->addRole(new Role('guest'))
            ->addRole(new Role('member'))
            ->addRole(new Role('admin'));

        $parents = array('guest', 'member', 'admin');
        $asshole = array('guest');

        $acl->addRole(new Role('dudeski'), $asshole);

        $acl->addResource(new Resource($resource));

        if ($resource == 'Application\Controller\Index' || $resource == 'Portfolio\Controller\Portfolio')
        {
            $acl->allow('guest', $resource);
        } else {
            $acl->deny('guest', $resource);
        }

        $acl->allow('member', $resource);
        $acl->allow('admin', $resource);

        /* Login acl */
        if ($acl->isAllowed('dudeski', $resource)) {
            return;
        }

        if ($resource != "Auth\\Controller\\Auth") {
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

