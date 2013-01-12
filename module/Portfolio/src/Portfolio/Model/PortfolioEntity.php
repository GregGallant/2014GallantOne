<?php

namespace Portfolio\Model;



/**
 * The Portfolio dbase Model
 */
class PortfolioEntity
{
    protected $id;
    protected $client_type_id;
    protected $name;
    protected $client_name;
    protected $image;
    protected $url;
    protected $details;
    protected $tech;
    protected $thejob;
    protected $start_date;
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
}
