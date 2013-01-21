<?php

namespace Auth\Entity;

use Doctrine\ORM\Mapping as ORM;

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
    protected $first_name;

    /**
     * @ORM\Column(type="string")
     */
    protected $last_name;

    /**
     * @ORM\Column(type="integer")
     */
    protected $status;

    /**
     * @ORM\Column(type="integer")
     */
    protected $acl_role_id;

    /**
    * ORM\OneToOne(targetEntity="AclRole")
    * ORM\JoinColumn(name="acl_role_id", referencedColumnName="id")
    */
    protected $acl_role;


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


    public function populate($data)
    {
        $this->setEmail($data['email']);
        $this->setPassword($data['password']);
        $this->setFirstName($data['first_name']);
        $this->setLastName($data['last_name']);

        // do checks for registration
        $this->setStatus($data['status']);
        $this->setAclRoleId($data['acl_role_id']);

    }


    public function populateLogin($data)
    {
        $this->setEmail($data['email']);
        $this->setPassword($data['password']);

    }


}