<?php
namespace Portfolio\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Portfolio\Model\Portfolio;

class PortfolioController extends AbstractActionController
{

    protected $portfolioTable;

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

    public function getPortfolioTable()
    {
        // If it DOESN'T exist, try to get it from the object
        if (!$this->portfolioTable) {
            $sm = $this->getServiceLocator();
            $this->portfolioTable = $sm->get('Portfolio\Model\PortfolioTable');
        }
        return $this->portfolioTable;
    }

}