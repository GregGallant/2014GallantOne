<?php

namespace Networks;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\AbstractFactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Db\Adapter\Adapter;

class NetworkAdapterFactory 
{
	//implements AbstractFactoryInterface
/*
    protected $configKey;

    public function __construct($key)
    {
        $this->configKey = $key;
    }

    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $config = $serviceLocator->get('Config');
        return new Adapter($config[$this->configKey]);
	}

	public function printKey() {
		echo $this->configKey;
	}
 */
	public function canCreateServiceWithName($sm, $name, $reqName) 
	{
		return true;
	}

	public function createServiceWithName($sm, $name, $reqName)  
	{
		return $this;
	}
}

