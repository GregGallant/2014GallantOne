<?php
namespace Clients\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Clients\ClientsManager;

class ClientsController extends AbstractActionController
{

    protected $pManager; // PortfolioManager class

    /*
    public function initClientsManager()
    {
        $sm = $this->getServiceLocator();
        $this->pManager = new ClientsManager($sm);
    }
    */
    /**
     * @return \Zend\View\Model\ViewModel
     */
    public function indexAction()
    {
        $view = new ViewModel(array());
        return $view;
    }
}
