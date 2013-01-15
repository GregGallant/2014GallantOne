<?php
namespace Photography\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Photography\PhotographyManager;

class PhotographyController extends AbstractActionController
{

    protected $pManager; // PortfolioManager class

    public function initPhotographyManager()
    {
        $sm = $this->getServiceLocator();
        $this->pManager = new PhotographyManager($sm);
    }

    /**
     * @return \Zend\View\Model\ViewModel
     */
    public function indexAction()
    {
        // Initalize a new layout for GallantNYC.com
        $this->layout('layout/layout.phtml');


        $view = new ViewModel(array());
        return $view;
    }
}
