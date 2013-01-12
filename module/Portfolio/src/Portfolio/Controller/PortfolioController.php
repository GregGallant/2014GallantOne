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

        $id = (int) $this->params()->fromRoute('id', 0);

        if (!$id) {
            return $this->redirect()->toRoute('portfolio', array(
                'portfolio' => 'web'
            ));
        }

        $clientsByType = $this->getPortfolioTable()->getPortfolioByType($id);

        /* Total Row Count by portfolio type for the jQuery */
        $totalRows = $this->getPortfolioTable()->getPortfolioCountByType($id);

        /* Handle the view */
        $view = new ViewModel(array(
            'clients' => $clientsByType,
            'totalContent' => $totalRows,
        ));


        $sm = $this->getServiceLocator();
        $cResultSet = $this->getPortfolioTable()->goResultSet($sm, $id);
        //var_dump($cResultSet);
        //var_dump($cResultSet instanceof ResultInterface);

        // Hydrate the result set
        $portfolioEntity = new HydratingResultSet(new ReflectionHydrator, $this->getPortfolioEntity());
        $portfolioEntity->initialize($cResultSet);
        //var_dump($portfolioEntity);
        /* Port Image Controls */

        $pcView = new ViewModel(array('clients'=>$portfolioEntity));
        $portControls = $pcView->setTemplate('portfolio/portfolio/portcontrol.phtml');
        $view->addChild($portControls, 'portcontrol');




        /* The Portfolio Screen and it's view  if we were to ever do this*/
        /*
        $portScreenView = new ViewModel(array(
            'screenClients' => $this->getPortfolioTable()->fetchAll()
        ));
        $portScreenView->setTemplate('portfolio/portfolio/portScreen.phtml');

        $view->addChild($portScreenView, 'portScreen');

        */
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

        $clientsByType = $this->getPortfolioTable()->getPortfolioByType($id);

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