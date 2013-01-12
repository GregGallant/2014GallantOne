<?php
namespace Portfolio\Model;

use Zend\Db\TableGateway\TableGateway;

class PortfolioTable
{
    protected $tableGateway;

    public function __construct(TableGateway $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function fetchAll()
    {
        $resultSet = $this->tableGateway->select();
        return $resultSet;
    }

    public function getPortfolio($id)
    {
        $id = (int) $id;
        $rowset = $this->tableGateway->select(array('id' => $id));
        $row = $rowset->current();
        if(!$row) {
            throw new \Exception("Could not find row $id");
        }

        return $row;
    }

    /* Get Portfolio Type */
    public function getPortfolioByType($client_type_id)
    {
        //TODO: if null results, get from client_type_id 1

        $client_type_id = (int) $client_type_id;

        return $this->tableGateway->select(array('client_type_id' => $client_type_id));
    }


    public function goResultSet($service, $client_type_id) {

        $sm = $service;

        $sql = "SELECT * FROM portfolio WHERE client_type_id = " . $client_type_id;
        $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
        $stmt = $dbAdapter->createStatement($sql);
        $resultSet = $stmt->execute();
        return $resultSet;
    }

    public function getPortfolioCountByType($client_type_id)
    {
        $client_type_id = (int) $client_type_id;
        $rowset = $this->tableGateway->select(array('client_type_id' => $client_type_id));

        return count($rowset);
    }


}