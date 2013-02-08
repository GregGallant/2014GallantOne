<?php
namespace Networks;

use Networks\Model\NetworksTable;

class NetworksManagerImpl implements NetworksManager
{

    protected $sm; // Service Locator
    protected $networkDao;


    public function __construct($sm)
    {
        $this->networkDao = new NetworksTable($sm);
    }

    public function getAllNetworks()
    {
        return $this->networkDao->getNetworks();
    }
}