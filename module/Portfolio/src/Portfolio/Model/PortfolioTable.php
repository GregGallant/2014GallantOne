<?php
namespace Portfolio\Model;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql\Select;

class PortfolioTable
{
    protected $tableGateway;
    protected $clientTypeId;

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
    public function getPortfolioByType($adapter, $client_type_id)
    {

        $sm = $adapter;
        $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
        //TODO: if null results, get from client_type_id 1


        $client_type_id = (int) $client_type_id;
        $this->setClientTypeId($client_type_id);

        //$rowset = $this->tableGateway->select(array('client_type_id' => $client_type_id));
        /*
        $portfolioTable = new TableGateway('portfolio', $dbAdapter);
        $rowset = $portfolioTable->select(function(Select $select) {
            $select->where('client_type_id', $this->getClientTypeId());
            $select->order('start_date DESC');

        });
        */

        $sql = "SELECT * FROM portfolio WHERE client_type_id = " . $client_type_id . " ORDER BY start_date DESC";
        $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
        $stmt = $dbAdapter->createStatement($sql);
        $resultSet = $stmt->execute();
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

    public function getPortfolioCountByType($client_type_id)
    {
        $client_type_id = (int) $client_type_id;
        $rowset = $this->tableGateway->select(array('client_type_id' => $client_type_id));

        return count($rowset);
    }


}