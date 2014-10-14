<?php
namespace Photography;

use Photography\Model\PhotographyTable;

class PhotographyManager {

    protected $sm; // Service Locator
    protected $pDao;


    public function __construct($sm)
    {
        $this->pDao = new PhotographyTable($sm);
    }
}
