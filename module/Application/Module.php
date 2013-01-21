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

use Application\View\Helper as MyViewHelper;
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

        /* Retrieve Session */
        $gUser = new Container('gUser');
        if ($gUser->eName != null)
        {
            $userData = $authManager->getUserByEmail($gUser->eName);
            $user = $userData[0];
            $userRoleObj = $authManager->getUserRole($user);
            $userRole = $userRoleObj[0]->getRole();

        } else {
            $userRole = 'guest';
        }

        $roleData = $authManager->getUserRoles();

        $mvh = new MyViewHelper($this->ev->getRouteMatch());

        $resource = $mvh->getController();
        $action = $mvh->getAction();

        /* Create ACL */
        $acl = new Acl();

        foreach($roleData as $aRole) {
            $acl->addRole(new Role($aRole->getRole()));
        }

        $acl->addRole(new Role($gUser->eName), $userRole);

        /* Create this resource and/or action */
        $acl->addResource(new Resource($resource));
        $acl->addResource(new Resource($action), $resource);


        /* What we are protecting */
        if ($resource != 'Album\Controller\Album')
        {
            $acl->allow('guest', $resource);
        } else {

            if ($action == 'index') {
                $acl->allow('guest', $resource);
            } else {
                $acl->deny('guest', $resource);
            }
        }

        $acl->allow('admin', $resource);

        /* Login acl */
        if ($acl->isAllowed($gUser->eName, $resource)) {
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
