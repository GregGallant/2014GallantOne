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

        return new ViewModel(array(
            'clients' => $this->getPortfolioTable()->getPortfolioByType($id),
        ));
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