<?php
namespace Networks\Service;

use Zend\Http\Client;
use Zend\Http\Client\Adapter\Curl;
use Zend\ServiceManager\ServiceManagerAwareInterface;
use Zend\ServiceManager;

class TestService
{
	protected $httpClient;

	protected $serviceManager;


	public function setServiceManager($sm) {
		$this->serviceManager = $sm;	
	}

	public function __construct() 
	{
		$this->httpClient = new \Zend\Http\Client();
		$adapter = new \Zend\Http\Client\Adapter\Curl;
		$adapter->setOptions(array(CURLOPT_FOLLOWLOCATION => true));
		//$client->setAdapter($adapter);
	}

	public function send(TestApi $api) 
	{
		$this->httpClient->setRawBody($api); // toString etc.
		$response = $this->httpClient->send();

		$apiResponse = $this->serviceManager->get(get_class($api) . "Response");

		return $apiResponse->setData($response->getBody());

	}

	public function setHttpClient(\Zend\Http\Client $httpClient)
	{
		$this->httpClient = $httpClient;
		return $this;
	}	

	/* Test to see if the service is running - simply writes to log */
	public function goService() 
	{
		// echo "Service is a go!"; // Log this instead
		$fh = fopen('C:\Users\GallantMedia\Documents\GallantMedia\Websites\GallantOne\module\Networks\src\Networks\Service\service.log', 'rw+');
		fwrite($fh, 'Service is a go!');
		fclose($fh);
	}

	public function onScreen() {
		echo "Hey now, you're a rock star";
	}

}

?>
