<?php

namespace Networks\Form;

use Zend\Stdlib\Hydrator\ObjectProperty;
use Zend\Form\Annotation;

/**
 * @Annotation\Name("networkRefresh")
 * @Annotation\Hydrator("Zend\Stdlib\Hydrator\ObjectProperty")
 */
class NetworkRefresh {


    /**
     * @Annotation\Attributes({"type":"submit"})
     */
    public $submit;



}
