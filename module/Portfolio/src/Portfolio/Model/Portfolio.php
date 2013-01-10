<?php

namespace Portfolio\Model;

use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterInterface;
use Zend\InputFilter\Factory as InputFactory;

/**
 * The Portfolio dbase Model
 */
class Portfolio
{
    public $id;
    public $client_type_id;
    public $name;
    public $client_name;
    public $image;
    public $url;
    public $details;
    public $tech;
    public $thejob;
    public $start_date;
    public $end_date;

    public function exchangeArray($data)
    {
        $this->id = (isset($data['id'])) ? $data['id'] : null;
        $this->client_type_id = (isset($data['client_type_id'])) ? $data['client_type_id'] : null;
        $this->name = (isset($data['name'])) ? $data['name'] : null;
        $this->client_name = (isset($data['client_name'])) ? $data['client_name'] : null;
        $this->image = (isset($data['image'])) ? $data['image'] : null;
        $this->url = (isset($data['url'])) ? $data['url'] : null;
        $this->details = (isset($data['details'])) ? $data['details'] : null;
        $this->tech = (isset($data['tech'])) ? $data['tech'] : null;
        $this->thejob = (isset($data['thejob'])) ? $data['thejob'] : null;
        $this->start_date = (isset($data['start_date'])) ? $data['start_date'] : null;
        $this->end_date = (isset($data['end_date'])) ? $data['end_date'] : null;
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