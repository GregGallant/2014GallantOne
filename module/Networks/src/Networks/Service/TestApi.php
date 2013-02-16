<?php

namespace Networks\Service;

class TestApi implements ConfigAwareInterface
{

	public function setConfig($config) 
	{
		$this->config = $config;
		return $this;
	}

	public function getConfig() 
	{
		return $this->config;
	}


}
