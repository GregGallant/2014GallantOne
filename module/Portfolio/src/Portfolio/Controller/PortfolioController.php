<?php
namespace Portfolio\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Portfolio\Entity\Portfolio;
use Zend\Db\Adapter\Driver\ResultInterface;
use Doctrine\ORM\EntityManager;
use Portfolio\PortfolioManager;

class PortfolioController extends AbstractActionController
{

    protected $pManager; // PortfolioManager class

    public function initPortfolioManager()
    {
        $sm = $this->getServiceLocator();
        $this->pManager = new PortfolioManager($sm);
    }

    /**
     * The LightBox Client Info
     * @return \Zend\View\Model\ViewModel
     */
    public function lightAction()
    {
        $id = (int) $this->params()->fromRoute('id', 0);

        $this->initPortfolioManager();
        $view = new ViewModel(array( 'client' => $this->pManager->getPortfolio($id), ));

        // Lightbox Layout
        $this->layout('layout/portLayout.phtml');

        return $view;
    }

    /**
     * The actual portfolio
     * @return \Zend\View\Model\ViewModel
     */
    public function indexAction()
    {


        $this->initPortfolioManager();
        //$sm = $this->getServiceLocator();

        //$pManager = new PortfolioManager($sm, $this->em);

        $id = (int) $this->params()->fromRoute('id', 0);

        if (!$id) {
            return $this->redirect()->toRoute('portfolio', array(
                'portfolio' => 'web'
            ));
        }

        /* Get Dimensions of images and thumbnails on port screen */
        $iDim = $this->pManager->getImageDimensions($id);
        $tDim = $this->pManager->getThumbDimensions($id);


        /* Get clients by type */

        $portfolioEntity = $this->pManager->getPortfolioByType($id);

        /* Total Row Count by portfolio type for the jQuery */
        $totalRows = $this->pManager->getPortfolioCountByType($id);

        /* Handle the view */
        $view = new ViewModel(array(
            'clients' => $portfolioEntity,
            'totalContent' => $totalRows,
            'iWidth' => $iDim['width'],
            'iHeight' => $iDim['height'],
        ));


        /* Handle Control view */
        $pcView = new ViewModel(array(
            'clients'=>$portfolioEntity,
            'tWidth' => $tDim['width'],
            'tHeight' => $tDim['height'],

        ));

        /* Add Portfolio Screen Controls */
        $portControls = $pcView->setTemplate('portfolio/portfolio/portcontrol.phtml');
        $view->addChild($portControls, 'portcontrol');
        return $view;
    }

}