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

            $this->auth = new AuthAdapter($this->dbAdapter, 'user', 'email', 'password');

            $this->auth->setIdentity($user->getEmail());

            $password = $this->decryptPassword($user, $salt, $encPass);

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


    public function encryptPassword($user)
    {
        $uPassword = $user->getPassword();

        $algorithm = MCRYPT_BLOWFISH;
        $mode = MCRYPT_MODE_CFB;
        $salt = $this->generateSalt();
        $user->setSalt($salt);

        $iv_size = mcrypt_get_iv_size($algorithm, $mode);
        $iv = mcrypt_create_iv($iv_size, MCRYPT_DEV_URANDOM);
        $iv = "GregGallant";
        $mpass = trim(base64_encode(mcrypt_encrypt($algorithm, $salt, $uPassword, $mode, $iv)));
        $user->setPassword($mpass);

        return $user;
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

    private function decryptPassword(User $user, $salt, $encPass)
    {


        $algorithm = MCRYPT_BLOWFISH;
        $mode = MCRYPT_MODE_CFB;
        $iv_size = mcrypt_get_iv_size($algorithm, $mode);
        $iv = mcrypt_create_iv($iv_size, MCRYPT_DEV_URANDOM);
        // Get iv
        $ivPassword = mcrypt_decrypt($algorithm, $salt, base64_decode($encPass), $mode, str_pad('', $iv_size));
        var_dump($salt);
        $db_iv = substr($ivPassword, 0, $iv_size);
        var_dump($db_iv);
        $iv = "GregGallant";
        //$dePass = substr(rtrim($ivPassword, "\0"), $iv_size);
        $password = trim(base64_encode(mcrypt_encrypt($algorithm, $salt, $user->getPassword(), $mode, $iv)));
        var_dump($password);
        return $password;

    }
}
