<?php
namespace Portfolio\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Portfolio\Model\Portfolio;
use Zend\Db\Adapter\Driver\ResultInterface;
use Zend\Db\ResultSet\HydratingResultSet;
use Zend\Stdlib\Hydrator\Reflection as ReflectionHydrator;

class PortfolioController extends AbstractActionController
{

    protected $portfolioTable;
    protected $portfolioEntity;

    public function indexAction()
    {
        return new ViewModel(array(
            'clients' => $this->getPortfolioTable()->fetchAll(),
        ));
    }


    public function lightAction()
    {
        $id = (int) $this->params()->fromRoute('id', 0);

        $view = new ViewModel(array( 'client' => $this->getPortfolioTable()->getPortfolio($id), ));

        // Lightbox Layout
        $this->layout('layout/portLayout.phtml');

        return $view;
    }

    public function webAction()
    {

        $iWidth = "400px";
        $iHeight = "294px";
        $tWidth = "80px";
        $tHeight = "50px";

        $sm = $this->getServiceLocator();

        $id = (int) $this->params()->fromRoute('id', 0);

        if (!$id) {
            return $this->redirect()->toRoute('portfolio', array(
                'portfolio' => 'web'
            ));
        }

        $clientsByType = $this->getPortfolioTable()->getPortfolioByType($sm, $id);


        // Hydrate the result set
        $portfolioEntity = new HydratingResultSet(new ReflectionHydrator, $this->getPortfolioEntity());
        $portfolioEntity->initialize($clientsByType);

        /* Total Row Count by portfolio type for the jQuery */
        $totalRows = $this->getPortfolioTable()->getPortfolioCountByType($id);

        // Let's pass some image sizing information - we'll do it the proper way in phase 2
        if ($id == 3) {
            $iWidth="224px";
            $iHeight="294px";
        } elseif ($id == 4) {
            $iWidth="600px";
            $iHeight="220px";
        }

        /* Handle the view */
        $view = new ViewModel(array(
            'clients' => $portfolioEntity,
            'totalContent' => $totalRows,
            'iWidth' => $iWidth,
            'iHeight' => $iHeight,
        ));




        /* Handling database query for a proper ResultSet */
        $cResultSet = $this->getPortfolioTable()->getHydraPortfolioByType($sm, $id);

        // Hydrate the result set
        $portfolioEntity = new HydratingResultSet(new ReflectionHydrator, $this->getPortfolioEntity());
        $portfolioEntity->initialize($cResultSet);

        /* Handle thumbnail width and height */
        if ($id == 3) {
            $tWidth="40px";
            $tHeight="50px";
        } elseif ($id == 4) {
            $tWidth="80px";
            $tHeight="35px";
        }

        $pcView = new ViewModel(array(
            'clients'=>$portfolioEntity,
            'tWidth' => $tWidth,
            'tHeight' => $tHeight,

        ));
        $portControls = $pcView->setTemplate('portfolio/portfolio/portcontrol.phtml');
        $view->addChild($portControls, 'portcontrol');

        return $view;
    }

    public function portcontrolAction()
    {
        $id = (int) $this->params()->fromRoute('id', 0);

        if (!$id) {
            return $this->redirect()->toRoute('portfolio', array(
                'portfolio' => 'web'
            ));
        }

        $sm = $this->getServiceLocator();
        $clientsByType = $this->getPortfolioTable()->getPortfolioByType($id, $sm);

        /* Handle the view */
        $view = new ViewModel(array(
            'clients' => $clientsByType,
        ));

        return $view;
    }

    public function getPortfolioTable()
    {
        // If it DOESN'T exist, try to get it from the object
        if (!$this->portfolioTable) {
            $sm = $this->getServiceLocator();
            $this->portfolioTable = $sm->get('Portfolio\Model\PortfolioTable');
        }
        return $this->portfolioTable;

    }

    public function getPortfolioEntity() {
        $sm = $this->getServiceLocator();
        $this->portfolioEntity = $sm->get('Portfolio\Model\PortfolioEntity');
        return $this->portfolioEntity;
    }


}