<?php

namespace Networks\Entity;

use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterInterface;
use Zend\InputFilter\Factory as InputFactory;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="networks")
 */
class Networks
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
    protected $name;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $datecreated;


    public function __construct()
    {
        $dtz = date_default_timezone_get();
        $this->datecreated = new \DateTime('now', new \DateTimeZone($dtz));
    }


    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setDatecreated($datecreated)
    {
        $this->datecreated = $datecreated;
    }

    public function getDatecreated()
    {
        return $this->datecreated;
    }


}

