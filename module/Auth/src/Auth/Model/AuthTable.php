<?php
namespace Auth\Model;

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

        $sql = "SELECT u FROM Auth\Entity\User u WHERE u.email = '".$email."'";

        $query = $this->em->createQuery($sql);
        $resultSet = $query->getResult();

        //$row = $this->em->find('Auth\Entity\User', $email);

       // if(!$row) {
            ; // row not found
        //}
        return $resultSet;
        //return $row;

    }

    public function saveUser(User $user) {
        ;
    }
}