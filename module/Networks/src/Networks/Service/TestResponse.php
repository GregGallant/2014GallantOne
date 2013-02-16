<?php

namespace Networks\Service;

use Zend\ServiceManager\AbstractFactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;


class TestResponse implements AbstractFactoryInterface 
{

	public function canCreateServiceWithName(ServiceLocatorInterface $serviceLocator, $name, $requestedName)
	{
		if(class_exists($name)) {
			return true;
		}

		return false;
	}

	public function createServiceWithName(ServiceLocatorInterface $serviceLocator, $name, $requestedName) 
	{
		return new $name;
	}


}

