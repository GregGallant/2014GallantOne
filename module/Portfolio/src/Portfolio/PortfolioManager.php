<?php
namespace Portfolio;

use Portfolio\Model;
use Zend\Db\ResultSet\HydratingResultSet;
use Zend\Stdlib\Hydrator\Reflection as ReflectionHydrator;
use Portfolio\Model\PortfolioTable;

class PortfolioManager {

    protected $sm; // Service Locator
    protected $em; // EntityManager
    protected $pDao;


    public function __construct($sm, $em) {
        $this->em = $em;
        $this->sm = $sm;
        $this->pDao = new PortfolioTable($this->sm);
    }


    public function getPortfolio($id)
    {
        return $this->pDao->getPortfolioById($id);
    }

    /**
     * @param $client_type_id
     * @return mixed
     */
    public function getPortfolioByType($client_type_id)
    {

        $client_type_id = (int) $client_type_id;

        /* Grab sql result from the PortfolioTable */
        $portfolioEntity = $this->pDao->getPortfolioByClientType($client_type_id);

        return $portfolioEntity;

    }

    public function getPortfolioCountByType($client_type_id)
    {
        return $this->pDao->getPortfolioCountByClientType($client_type_id);
    }


    /**
     * @param $id
     * @return array
     */
    public function getImageDimensions($id)
    {
        $imageDim = array();
        $imageDim['height'] = "294px";
        $imageDim['width'] = "400px";


        if ($id == 3) {
            $imageDim['width']="224px";
            $imageDim['height']="294px";

        } elseif ($id == 4) {
            $imageDim['width']="600px";
            $imageDim['height']="220px";
        }


        return $imageDim;
    }

    /**
     * @param $id
     * @return array
     */
    public function getThumbDimensions($id)
    {
        $thumbDim = array();
        $thumbDim['height'] = "50px";
        $thumbDim['width'] = "80px";

        if ($id == 3) {

            $thumbDim['width']="40px";
            $thumbDim['height']="50px";
        } elseif ($id == 4) {
            $thumbDim['width']="80px";
            $thumbDim['height']="35px";
        }

        return $thumbDim;

    }


    public function getPortfolioEntity() {
        $sm = $this->getServiceLocator();
        $this->portfolioEntity = $sm->get('Portfolio\Model\PortfolioEntity');
        return $this->portfolioEntity;
    }

}
