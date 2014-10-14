<?php

namespace Auth;

use Auth\Entity\User;
use Auth\Form\BaseUserForm;
use Auth\Model\AuthTable;
use Zend\Authentication\Result;
use Zend\Authentication\Adapter\DbTable as AuthAdapter;

define("ENC_ALGORITHM", MCRYPT_BLOWFISH);
define("ENC_MODE", MCRYPT_MODE_CFB);


class AuthManager
{


    protected $dbAdapter;

    protected $auth;

    public function __construct($sm)
    {
        $this->authDao = new AuthTable($sm);
        $this->dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
    }

    public function getUser(User $user)
    {
        return $this->authDao->getUserByEmail($user->getEmail());
    }

    public function getUserByEmail($email)
    {
        return $this->authDao->getUserByEmail($email);
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

            /* Retrieve salt from user */
            $saltData = $this->authDao->getSaltByEmail($user->getEmail());
            $salt = $saltData[0]->getSalt();
            $encPass = $saltData[0]->getPassword();
            $ivy = $saltData[0]->getIvy();

            $this->auth = new AuthAdapter($this->dbAdapter, 'user', 'email', 'password');

            $this->auth->setIdentity($user->getEmail());

            $password = $this->decryptPassword($user, $salt, $encPass, $ivy);

            $this->auth->setCredential($password);


            $result = $this->auth->authenticate();

            return $result;

        }
    }

    public function getUserRole(User $user)
    {
        return $this->authDao->getUserRoleByEmail($user->getEmail());
    }

    public function getUserRoles()
    {
        return $this->authDao->getAclRoles();
    }


    public function encryptPassword(User $user)
    {
        $uPassword = $user->getPassword();

        //$algorithm = MCRYPT_BLOWFISH;
        //$mode = MCRYPT_MODE_CFB;
        $salt = $this->generateSalt();
        $user->setSalt($salt);

        $iv_size = mcrypt_get_iv_size(ENC_ALGORITHM, ENC_MODE);
        $iv = mcrypt_create_iv($iv_size, MCRYPT_DEV_URANDOM);

        $user->setIvy(base64_encode($iv));

        $mpass = trim(base64_encode(mcrypt_encrypt(ENC_ALGORITHM, $salt, $uPassword, ENC_MODE, $iv)));
        $user->setPassword($mpass);

        return $user;
    }

    private function encodePassword()
    {

    }

    private function decryptPassword(User $user, $salt, $encPass, $ivy)
    {
        $iv_size = mcrypt_get_iv_size(ENC_ALGORITHM, ENC_MODE);
        $stored_iv = base64_decode($ivy);
        $iv =  mcrypt_create_iv($iv_size, (int) $stored_iv);
        $password = trim(base64_encode(mcrypt_encrypt(ENC_ALGORITHM, $salt, $user->getPassword(), ENC_MODE, $stored_iv)));
        return $password;

    }


    private function generateSalt()
    {
        $password = "";
        $possible = "8327649bcdfxhjkmnprqtvwgzyBCDFGHJQLMNPKRTVWXZY";

        $maxlength = strlen($possible);

        if (PASSWORD_LENGTH > $maxlength) {
            $length = $maxlength; // uhm, what's are length?  Fix this a bit.
        } else {
            $length = PASSWORD_LENGTH;
        }

        $i = 0;

        while ($i < $length) {
            // pick a random character from the possible
            $char = substr($possible, mt_rand(0,$maxlength-1), 1);
            if (!strstr($password, $char)) {
                $password .= $char;
                $i++;
            }
        }

        return $password;
    }
}
