<?php

namespace Portfolio\Entity;

use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterInterface;
use Zend\InputFilter\Factory as InputFactory;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="portfolio")
 */
class Portfolio
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
    protected $client_type_id;
    /**
     * @ORM\Column(type="string")
     */
    protected $name;
    /**
     * @ORM\Column(type="string")
     */
    protected $client_name;
    /**
     * @ORM\Column(type="string")
     */
    protected $image;
    /**
     * @ORM\Column(type="string")
     */
    protected $url;
    /**
     * @ORM\Column(type="string")
     */
    protected $details;
    /**
     * @ORM\Column(type="string")
     */
    protected $tech;
    /**
     * @ORM\Column(type="string")
     */
    protected $thejob;
    /**
     * @ORM\Column(type="string")
     */
    protected $start_date;
    /**
     * @ORM\Column(type="string")
     */
    protected $end_date;

   

    public function setClientName($client_name)
    {
        $this->client_name = $client_name;
    }

    public function getClientName()
    {
        return $this->client_name;
    }

    public function setClientTypeId($client_type_id)
    {
        $this->client_type_id = $client_type_id;
    }

    public function getClientTypeId()
    {
        return $this->client_type_id;
    }

    public function setDetails($details)
    {
        $this->details = $details;
    }

    public function getDetails()
    {
        return $this->details;
    }

    public function setEndDate($end_date)
    {
        $this->end_date = $end_date;
    }

    public function getEndDate()
    {
        return $this->end_date;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setImage($image)
    {
        $this->image = $image;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setStartDate($start_date)
    {
        $this->start_date = $start_date;
    }

    public function getStartDate()
    {
        return $this->start_date;
    }

    public function setTech($tech)
    {
        $this->tech = $tech;
    }

    public function getTech()
    {
        return $this->tech;
    }

    public function setThejob($thejob)
    {
        $this->thejob = $thejob;
    }

    public function getThejob()
    {
        return $this->thejob;
    }

    public function setUrl($url)
    {
        $this->url = $url;
    }

    public function getUrl()
    {
        return $this->url;
    }

    public function populate($data = array())
    {
        $this->id = $data['id'];
        $this->client_type_id = $data['client_type_id'];
        $this->name = $data['name'];
        $this->client_name = $data['client_name'];
        $this->image = $data['image'];
        $this->url = $data['url'];
        $this->details = $data['details'];
        $this->tech = $data['tech'];
        $this->thejob = $data['thejob'];
        $this->start_date = $data['start_date'];
        $this->end_date = $data['end_date'];
    }

    public function setInputFilter(InputFilterInterface $inputFilter)
    {
        throw new \Exception("Not used");
    }

    public function getArrayCopy()
    {
        return get_object_vars($this);
    }
}