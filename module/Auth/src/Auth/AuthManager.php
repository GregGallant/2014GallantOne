<?php

namespace Auth;

use Auth\Entity\User;
use Auth\Form\BaseUserForm;
use Auth\Model\AuthTable;
use Zend\Authentication\Result;
use Zend\Authentication\Adapter\DbTable as AuthAdapter;

class AuthManager
{


    protected $dbAdapter;

    protected $auth;

    public function __construct($sm)
    {
        $this->authDao = new AuthTable($sm);
        $this->dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
    }

    public function authenticate()
    {

    }

    public function getUser(User $user)
    {
        return $this->authDao->getUserByEmail($user->getEmail());
    }

    public function setUser(User $user)
    {
        $this->authDao->saveUser($user);
    }

    public function authUser($form)
    {

        if ($form->isValid()) {

            $user = new User();
            $user->populateLogin($form->getData());

            $this->auth = new AuthAdapter($this->dbAdapter, 'user', 'email', 'password');
            //$authService = new AuthenticationService();

            $this->auth->setIdentity($user->getEmail());
            $this->auth->setCredential($user->getPassword());


            $result = $this->auth->authenticate();

            return $result;
            //$result = $authService->authenticate($this->auth);

        }
    }


    /* Primary authentication function */
    /*
    public function authenticateUser()
    {

        // Get the auth adapter

        $adapter = $this->getAuthAdapter();

    }

    private function getAuthAdapter()
    {
        $dbAdapter = Zend_Db_Table::getDefaultAdapter();

        $authAdapter = new AuthAdapter($dbAdapter, 'users');
        //$authAdapter = new Zend_Auth_Adapter_DbTable($dbAdapter);
    }
    */
}
