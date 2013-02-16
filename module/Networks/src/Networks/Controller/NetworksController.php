<?php
namespace Networks\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Networks\NetworksManagerImpl;
use Zend\Form\Annotation\AnnotationBuilder;
use Networks\Form\NetworkRefresh;

define("PYTHON", 'C:\Python27\python');
define("PYSCRIPT",'"C:\Users\GallantMedia\Documents\GallantMedia\Websites\GallantOne\public\images\iecapt\networkRefresh.py"');

class NetworksController extends AbstractActionController
{

    protected $networksManager; // PortfolioManager class

    public function initNetworksManager()
    {
        $sm = $this->getServiceLocator();
        $this->networksManager = new NetworksManagerImpl($sm);
    }

    /**
     * @return \Zend\View\Model\ViewModel
     */
    public function indexAction()
    {
        // Initalize a new layout for GallantNYC.com
        $this->layout('layout/networksLayout.phtml');

        $this->initNetworksManager();
/*
        try {
            $allNetworks = $this->networksManager->getAllNetworks();
        } catch (\Exception $e) {
            $allNetworks = array();
            var_dump($e->getMessage());
        }
 */
		$allNetworks = array();
        /* Build the submit 'form' */
        $builder = new AnnotationBuilder();
        $form = $builder->createForm(new NetworkRefresh());
        $form->get('submit')->setAttribute('value', 'Refresh Networks');
        $form->setAttribute("method", "POST");
        $request = $this->getRequest();

        /* Handle reload websites */
        if ($request->isPost()) {
            try {
                $cmd = PYTHON.' '.PYSCRIPT;
                system($cmd, $retval);
            } catch(\Exception $e) {
                var_dump($e->getMessage());
            }
            return $this->redirect()->toRoute('networks');
        }

		$sm = $this->getServiceLocator();
		$testMe = $sm->get('TestService');
		$testMe->setServiceManager($sm);
		$apiMe = $sm->get('TestApi');
		//var_dump($apiMe->getConfig());
	//	$resp = $testMe->send($api);
		//$serviceEcho = $testMe->onScreen(); // this fires
		//$testMe->send($apiMe);
        //$view = new ViewModel(array('form'=>$form, 'allNetworks'=>$allNetworks, 'serviceTest'=>$apiMe->getConfig()));
        $view = new ViewModel(array('form'=>$form, 'allNetworks'=>$allNetworks, 'serviceTest'=>$testMe->goService()));
        return $view;
    }


    public function designAction()
    {
        $route = $this->getServiceLocator()->get('router');
        $thisRoute = $route->getRequestUri()->getPath();
        $view = new ViewModel(array('thisRoute'=>$thisRoute));
        $view->setTerminal(true);
        return $view;
    }
}
