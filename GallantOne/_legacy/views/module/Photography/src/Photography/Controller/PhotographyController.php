<?php
namespace Photography\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Photography\PhotographyManager;
use Zend\Mvc\Service\ViewHelperManagerFactory;

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


        $this->layout('layout/photographyLayout.phtml');

        $view = new ViewModel(array());
        //$view->setTerminal(true);
        return $view;
    }
}
