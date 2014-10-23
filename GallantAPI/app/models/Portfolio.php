<?php

class Portfolio extends \Eloquent
{

    protected $table = 'portfolio';

    /**
     * @var
     */
    protected $id;

    protected static $client_type_id;
    
    protected static $name;
    
    protected static $client_name;
    
    protected static $image;
    
    protected static $url;
    
    protected static $details;
    
    protected static $tech;
    
    protected static $thejob;
    
    protected static $start_date;
    
    protected static $end_date;

    /**
     * @return mixed
     */
    public function getClientName()
    {
        return $this->$client_name;
    }

    /**
     * @param mixed $client_name
     */
    public function setClientName($client_name)
    {
        $this->$client_name = $client_name;
    }

    /**
     * @return mixed
     */
    public function getClientTypeId()
    {
        return $this->$client_type_id;
    }

    /**
     * @param mixed $client_type_id
     */
    public function setClientTypeId($client_type_id)
    {
        $this->$client_type_id = $client_type_id;
    }

    /**
     * @return mixed
     */
    public function getDetails()
    {
        return $this->$details;
    }

    /**
     * @param mixed $details
     */
    public function setDetails($details)
    {
        $this->$details = $details;
    }

    /**
     * @return mixed
     */
    public function getEndDate()
    {
        return $this->$end_date;
    }

    /**
     * @param mixed $end_date
     */
    public function setEndDate($end_date)
    {
        $this->$end_date = $end_date;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->$image;
    }

    /**
     * @param mixed $image
     */
    public function setImage($image)
    {
        $this->$image = $image;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->$name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->$name = $name;
    }

    /**
     * @return mixed
     */
    public function getStartDate()
    {
        return $this->$start_date;
    }

    /**
     * @param mixed $start_date
     */
    public function setStartDate($start_date)
    {
        $this->$start_date = $start_date;
    }

    /**
     * @return string
     */
    public function getTable()
    {
        return $this->table;
    }

    /**
     * @param string $table
     */
    public function setTable($table)
    {
        $this->table = $table;
    }

    /**
     * @return mixed
     */
    public function getTech()
    {
        return $this->$tech;
    }

    /**
     * @param mixed $tech
     */
    public function setTech($tech)
    {
        $this->$tech = $tech;
    }

    /**
     * @return mixed
     */
    public function getThejob()
    {
        return $this->$thejob;
    }

    /**
     * @param mixed $thejob
     */
    public function setThejob($thejob)
    {
        $this->$thejob = $thejob;
    }

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->$url;
    }

    /**
     * @param mixed $url
     */
    public function setUrl($url)
    {
        $this->$url = $url;
    }
    
}
