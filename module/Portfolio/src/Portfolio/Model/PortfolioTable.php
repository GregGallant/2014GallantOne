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
    protected $tableGateway;
    protected $clientTypeId;
    protected $sm;
    protected $em;

/*    public function __construct(TableGateway $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }
*/
    public function __construct($sm)
    {
        $this->sm = $sm;
        $this->em = $this->sm->get('Doctrine\ORM\EntityManager');

    }

    public function fetchAll()
    {
        $resultSet = $this->tableGateway->select();
        return $resultSet;
    }

    public function getPortfolioById($id)
    {
        $id = (int) $id;
        //$rowset = $this->tableGateway->select(array('id' => $id));
        $row = $this->em->find('Portfolio\Entity\Portfolio', $id);
        //$row = $rowset->current();
        if(!$row) {
            throw new \Exception("Could not find row $id");
        }

        return $row;
    }

    /* Get Portfolio Type */
    public function getPortfolioByClientType($client_type_id)
    {

        $sql = 'SELECT p FROM Portfolio\Entity\Portfolio p WHERE p.client_type_id = ' . $client_type_id . ' ORDER BY p.start_date DESC';

        $query = $this->em->createQuery($sql);
        $resultSet = $query->getResult();

        return $resultSet;
    }

    protected function setClientTypeId($client_type_id) {
        $this->clientTypeId = $client_type_id;
    }

    protected function getClientTypeId() {
            return $this->clientTypeId;
    }

    public function getHydraPortfolioByType($service, $client_type_id) {

        $sm = $service;

        $sql = "SELECT * FROM portfolio WHERE client_type_id = " . $client_type_id;
        $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
        $stmt = $dbAdapter->createStatement($sql);
        $resultSet = $stmt->execute();
        return $resultSet;
    }

    public function getPortfolioCountByClientType($client_type_id)
    {
        $client_type_id = (int) $client_type_id;

        $sql = 'SELECT p FROM Portfolio\Entity\Portfolio p WHERE p.client_type_id = ' . $client_type_id;

        //$rowset = $em->find('Portfolio\Entity\Portfolio', $client_type_id);
        //$rowset = $em->find('Portfolio\Entity\Portfolio', $client_type_id);

        $query = $this->em->createQuery($sql);
        $rowset = $query->getResult();
       /*
        $dbAdapter = $this->sm->get('Zend\Db\Adapter\Adapter');
        $stmt = $dbAdapter->createStatement($sql);
        $rowset = $stmt->execute();
        */
        //$rowset = $this->tableGateway->select(array('client_type_id' => $client_type_id));

        return count($rowset);
    }


}