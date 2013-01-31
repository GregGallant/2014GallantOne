<?php
namespace Networks\Model;

use Doctrine\ORM\EntityManager;

class NetworksTable
{

    protected $em;

    public function __construct($sm)
    {
        $this->em = $sm->get('Doctrine\ORM\EntityManager');
        //$this->em = $sm->get('doctrine.entitymanager.orm_gallantmedia'); // Figure out how to create a new entity manager for a seperate database
        //$this->em = $sm->get('gmAdapter');
    }

    public function getNetworks()
    {
        $sql = "SELECT n FROM Networks\Entity\Networks n";

        $query = $this->em->createQuery($sql);
        return $query->getResult();
    }

}
