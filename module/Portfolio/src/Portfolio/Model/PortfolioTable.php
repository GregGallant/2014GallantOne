<?php
namespace Portfolio\Model;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql\Select;
use Zend\Db\Adapter\Driver\ResultInterface;
use Zend\Db\ResultSet\HydratingResultSet;
use Zend\Stdlib\Hydrator\Reflection as ReflectionHydrator;
use Doctrine\ORM\EntityManager;

class PortfolioTable
{

    protected $em;

    public function __construct($sm)
    {
        $this->em = $sm->get('Doctrine\ORM\EntityManager');

    }

    /**
     * @param $id
     * @return mixed
     * @throws \Exception
     */
    public function getPortfolioById($id)
    {
        $id = (int) $id;

        $row = $this->em->find('Portfolio\Entity\Portfolio', $id);

        if(!$row) {
            throw new \Exception("Could not find row $id");
        }

        return $row;
    }

    /**
     * @param $client_type_id
     * @return mixed
     */
    public function getPortfolioByClientType($client_type_id)
    {

        $sql = 'SELECT p FROM Portfolio\Entity\Portfolio p WHERE p.client_type_id = ' . $client_type_id . ' ORDER BY p.start_date DESC';

        $query = $this->em->createQuery($sql);
        $resultSet = $query->getResult();

        return $resultSet;
    }

    /**
     * @param $client_type_id
     * @return int
     */
    public function getPortfolioCountByClientType($client_type_id)
    {
        $client_type_id = (int) $client_type_id;

        $sql = 'SELECT p FROM Portfolio\Entity\Portfolio p WHERE p.client_type_id = ' . $client_type_id;

        $query = $this->em->createQuery($sql);
        $rowset = $query->getResult();
        return count($rowset);
    }


}