<?php
namespace Admin\Model;

use Doctrine\ORM\EntityManager;

class AdminTable
{

    protected $em;

    public function __construct($sm)
    {
        $this->em = $sm->get('Doctrine\ORM\EntityManager');

    }
}
