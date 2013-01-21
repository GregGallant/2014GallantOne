<?php
namespace Admin\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class AdminController extends AbstractActionController
{

    protected $pManager; // PortfolioManager class

    /*
    public function initAdminManager()
    {
        $sm = $this->getServiceLocator();
        $this->pManager = new AdminManager($sm);
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
