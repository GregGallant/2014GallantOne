<?php
namespace Auth\Model;

use Auth\Entity\User;
use Auth\Entity\AclRole;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\NativeQuery;
use Doctrine\ORM\Query\ResultSetMapping;

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

    /**
     * Returns the ACL Role of the specified user
     * @param $email
     * @return mixed
     */
    public function getUserRoleByEmail($email)
    {

        // DQL is seriously stupid.  Map an actual SQL statement the way Hibernate does, please.
        $rsm = new ResultSetMapping;
        $rsm->addEntityResult('Auth\Entity\User', 'u');
        $rsm->addEntityResult('Auth\Entity\AclRole', 'r');
        $rsm->addFieldResult('r', 'id', 'id');
        $rsm->addFieldResult('r', 'role', 'role');

        $sql = 'select r.* FROM user u, acl_role r WHERE u.acl_role_id = r.id AND u.email = "'.$email.'"';

        $query = $this->em->createNativeQuery($sql, $rsm);

        $resultSet = $query->getResult();

        return $resultSet;
    }

    public function getSaltByEmail($email)
    {
        $rsm = new ResultSetMapping;
        $rsm->addEntityResult('Auth\Entity\User', 'u');
        $rsm->addFieldResult('u', 'id', 'id');
        $rsm->addFieldResult('u', 'salt', 'salt');
        $rsm->addFieldResult('u', 'ivy', 'ivy');
        $rsm->addFieldResult('u', 'password', 'password');

        $sql = 'select u.* FROM user u WHERE u.email = "'.$email.'"';

        $query = $this->em->createNativeQuery($sql, $rsm);

        $resultSet = $query->getResult();

        return $resultSet;

    }

    public function getAclRoles()
    {
        $sql = "SELECT r FROM Auth\Entity\AclRole r";

        $query = $this->em->createQuery($sql);
        return $query->getResult();
    }
}