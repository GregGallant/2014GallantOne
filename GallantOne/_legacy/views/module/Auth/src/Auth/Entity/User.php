<?php

namespace Auth\Entity;

use Doctrine\ORM\Mapping as ORM;
use Auth\Entity\AclRole;

/**
 * @ORM\Entity
 * @ORM\Table(name="user")
 */
class User
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string")
     */
    protected $email;

    /**
     * @ORM\Column(type="string")
     */
    protected $password;

    /**
     * @ORM\Column(type="string")
     */
    protected $salt;

    /**
     * @ORM\Column(type="string")
     */
    protected $ivy;

    /**
     * @ORM\Column(type="string")
     */
    protected $first_name;

    /**
     * @ORM\Column(type="string")
     */
    protected $last_name;

    /**
     * @ORM\Column(type="smallint")
     */
    protected $status;

    /**
     * @ORM\Column(type="integer")
     */
    protected $acl_role_id;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $create_date;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $expire_date;

    /**
     * ORM\OneToOne(targetEntity="AclRole", fetch="LAZY")
     * ORM\JoinColumn(name="acl_role_id", referencedColumnName="id")
     */
    protected $acl_role;


    public function __construct() {
        //date_default_timezone_set('America/New_York');
        $dtz = date_default_timezone_get();
        $this->create_date = new \DateTime('now', new \DateTimeZone($dtz));
        $this->expire_date = new \DateTime('9999-11-11 11:11:11', new \DateTimeZone($dtz));
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setFirstName($first_name)
    {
        $this->first_name = $first_name;
    }

    public function getFirstName()
    {
        return $this->first_name;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setLastName($last_name)
    {
        $this->last_name = $last_name;
    }

    public function getLastName()
    {
        return $this->last_name;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setAclRoleId($acl_role_id)
    {
        $this->acl_role_id = $acl_role_id;
    }

    public function getAclRoleId()
    {
        return $this->acl_role_id;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setCreateDate($create_date)
    {
        $this->create_date = $create_date;
    }

    public function getCreateDate()
    {
        return $this->create_date;
    }

    public function setExpireDate($expire_date)
    {
        $this->expire_date = $expire_date;
    }

    public function getExpireDate()
    {
        return $this->expire_date;
    }

    public function setSalt($salt)
    {
        $this->salt = $salt;
    }

    public function getSalt()
    {
        return $this->salt;
    }


    public function populate($data)
    {
        $this->setEmail($data['email']);
        $this->setPassword($data['password']);
        $this->setFirstName($data['first_name']);
        $this->setLastName($data['last_name']);
        $this->setIvy($data['ivy']);
        // do checks for registration
        $this->setStatus($data['status']);
        $this->setAclRoleId($data['acl_role_id']);

    }


    public function populateLogin($data)
    {
        $this->setEmail($data['email']);
        $this->setPassword($data['password']);

    }

    public function setAclRole($acl_role)
    {
        $this->acl_role = $acl_role;
    }

    public function getAclRole()
    {
        return $this->acl_role;
    }

    public function setIvy($ivy)
    {
        $this->ivy = $ivy;
    }

    public function getIvy()
    {
        return $this->ivy;
    }


}