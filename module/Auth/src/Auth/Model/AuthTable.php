<?php

use Auth\Entity\User;
use Doctrine\ORM\EntityManager;

class AuthTable
{
    protected $em;

    public function __construct($sm)
    {
        $this->em = $sm->get('Doctrine\ORM\EntityManager');
    }

    public function getUserByEmail($email)
    {

        $row = $this->em->find('Auth\Entity\User', $email);

        if(!$row) {
            ; // fail authentication
        }

        return $row;

    }

    public function saveUser(User $user) {
        ;
    }
}