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
use Zend\Session\Container as Container;
use Auth\Entity\User;

class Module
{
    protected $ev;

    protected $sm;

    protected $authManager;

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

        /* Call predispatch */
        $eventManager = $e->getApplication()->getEventManager();
        $eventManager->attach( \Zend\Mvc\MvcEvent::EVENT_DISPATCH, array($this, 'preDispatch'), 100 );
    }



    public function preDispatch()
    {
        /* ACL Stuff here */
        $mvh = new MyViewHelper($this->ev->getRouteMatch());
        $resource = $mvh->getController();
        $action = $mvh->getAction();


        $this->authManager = new AuthManager($this->sm);

        /* Retrieve Session */
        $gUser = new Container('gUser');

        /* Get User Role info */
        $userRole = $this->getUserRoleFromSession($gUser);

        /* Get all the user roles */
        $acl = $this->buildAclRoles();

        /* Build actual security */
        $acl = $this->buildSecurity($acl, $gUser, $userRole);

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

    /**
     * get the user role info from the user
     * @param Container $gUser
     * @return string
     */
    private function getUserRoleFromSession(Container $gUser)
    {
        if ($gUser->eName != null)
        {
            $userData = $this->authManager->getUserByEmail($gUser->eName);
            $user = $userData[0];
            $userRoleObj = $this->authManager->getUserRole($user);
            $userRole = $userRoleObj[0]->getRole();

        } else {
            $userRole = 'guest';
        }

        return $userRole;

    }

    private function buildAclRoles()
    {
        $roleData = $this->authManager->getUserRoles();

        /* Create ACL */
        $acl = new Acl();

        foreach($roleData as $aRole) {
            $acl->addRole(new Role($aRole->getRole()));
        }

        return $acl;

    }

    /**
     * Build Security Conditions and protect
     *
     * @param Acl $acl
     * @param Container $gUser
     * @param $userRole
     * @return \Zend\Permissions\Acl\Acl
     */
    private function buildSecurity(Acl $acl, Container $gUser, $userRole)
    {

        $mvh = new MyViewHelper($this->ev->getRouteMatch());
        $resource = $mvh->getController();
        $action = $mvh->getAction();

        $acl->addRole(new Role($gUser->eName), $userRole);

        /* Create this resource and/or action */
        $acl->addResource(new Resource($resource));
        $acl->addResource(new Resource($action), $resource);


        /* What we are protecting */
        //PSUEDO
        /**
         * Get a list of protected controllers from database
         * build iterative for loop
         */
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

        return $acl;
    }
}
