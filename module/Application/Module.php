<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application;

use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;

/* ACL Stuff*/
use Zend\Permissions\Acl\Acl;
use Zend\Permissions\Acl\Role\GenericRole as Role;
use Zend\Permissions\Acl\Resource\GenericResource as Resource;

use Album\View\Helper as MyViewHelper; // TODO: Put this in the application module
use Auth\AuthManager;
use Zend\Session\Container;
use Auth\Entity\User;

class Module
{
    protected $ev;

    protected $sm;

    public function onBootstrap(MvcEvent $e)
    {
        $e->getApplication()->getServiceManager()->get('translator');
        $eventManager        = $e->getApplication()->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);

        /* Pre-dispatching for ACL calls... */
        $this->ev = $e;
        /*
        $eventManager = $e->getApplication()->getEventManager();
        $eventManager->attach( \Zend\Mvc\MvcEvent::EVENT_DISPATCH, array($this, 'preDispatch'), 100 );
        */

        $app = $e->getApplication();
        $serviceManager = $app->getServiceManager();
        $this->sm = $serviceManager;

        $serviceManager->get('viewhelpermanager')->setFactory('myviewalias', function($sm) use ($e) {
            return new MyViewHelper($e->getRouteMatch());
        });

        $eventManager = $e->getApplication()->getEventManager();
        $eventManager->attach( \Zend\Mvc\MvcEvent::EVENT_DISPATCH, array($this, 'preDispatch'), 100 );
    }



    public function preDispatch()
    {
        /* ACL Stuff here */

        $authManager = new AuthManager($this->sm);

        $gUser = new Container('gUser');
        if ($gUser->eName != null)
        {
            $userData = $authManager->getUserByEmail($gUser->eName);
            $user = $userData[0];

            $userRole='guest';  // query
            //$userRole = $authManager->getUserRole($user);
        } else {
            $userRole = 'guest';
        }


        $mvh = new MyViewHelper($this->ev->getRouteMatch());
        var_dump($userRole);

        $resource = $mvh->getController();
        $action = $mvh->getAction();

        $acl = new Acl();

        $acl->addRole(new Role('guest'));
        $acl->addRole(new Role('member'), 'guest');
        $acl->addRole(new Role('admin'));

        $parents = array('guest', 'member', 'admin');
        $databaseUserLevel = array('guest');

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

            //$acl->allow('guest', $resource);
            $acl->deny('guest', $resource);
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


    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }
}
