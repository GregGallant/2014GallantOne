<?php
namespace Auth\Model;

use Auth\Entity\User;
use Auth\Entity\AclRole;
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

    /**
     * Returns the ACL Role of the specified user
     * @param $email
     * @return mixed
     */
    public function getUserRoleByEmail($email)
    {
        //$sql = 'select r.role FROM Auth\Entity\User u, Auth\Entity\AclRole r WHERE u.acl_role_id = r.id AND u.email = "'.$email.'"';

        $sql = 'select r.role FROM Auth\Entity\User u, Auth\Entity\AclRole r
        JOIN u.acl_role_id r
        WHERE u.email = "'.$email.'"';

        $query = $this->em->createQuery($sql);
        $resultSet = $query->getResult();

        return $resultSet;
    }
}