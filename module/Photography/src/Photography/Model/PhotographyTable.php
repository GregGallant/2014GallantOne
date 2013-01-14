<?php
namespace Photography\Model;

use Doctrine\ORM\EntityManager;

class PhotographyTable
{

    protected $em;

    public function __construct($sm)
    {
        $this->em = $sm->get('Doctrine\ORM\EntityManager');

    }
}
