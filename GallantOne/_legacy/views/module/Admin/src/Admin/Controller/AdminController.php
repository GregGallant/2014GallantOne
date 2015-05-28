<?php
namespace Admin\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class AdminController extends AbstractActionController
{


    /**
     * @return \Zend\View\Model\ViewModel
     */
    public function indexAction()
    {

        // Initalize a new layout for GallantNYC.com
        $this->layout('layout/networksLayout.phtml');

        /* Give router info to this */
        $route = $this->getServiceLocator()->get('router');
        $thisRoute = $route->getRequestUri()->getPath();
        $view = new ViewModel(array('thisRoute'=>$thisRoute));
        return $view;
    }
}
