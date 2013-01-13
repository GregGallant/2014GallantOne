<?php
namespace Portfolio\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Portfolio\Entity\Portfolio;
use Zend\Db\Adapter\Driver\ResultInterface;
use Zend\Db\ResultSet\HydratingResultSet;
use Zend\Stdlib\Hydrator\Reflection as ReflectionHydrator;
use Doctrine\ORM\EntityManager;
use Portfolio\PortfolioManager;

class PortfolioController extends AbstractActionController
{

    protected $portfolioTable;
    protected $portfolioEntity;

    /**
     * @var Doctrine\ORM\EntityManager
     */
    protected $em;

    public function setEntityManager(EntityManager $em)
    {
        $this->em = $em;
    }

    public function getEntityManager()
    {
        if (null === $this->em)
        {
            $this->em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        }

        return $this->em;
    }

    /**
     * The LightBox Client Info
     * @return \Zend\View\Model\ViewModel
     */
    public function lightAction()
    {
        $id = (int) $this->params()->fromRoute('id', 0);

        $sm = $this->getServiceLocator();
        $pManager = new PortfolioManager($sm, $this->em);
        $view = new ViewModel(array( 'client' => $pManager->getPortfolio($id), ));

        /*
        $view = new ViewModel(array(
            'client' =
        ));
        */

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


        $sm = $this->getServiceLocator();

        $pManager = new PortfolioManager($sm, $this->em);

        $id = (int) $this->params()->fromRoute('id', 0);

        if (!$id) {
            return $this->redirect()->toRoute('portfolio', array(
                'portfolio' => 'web'
            ));
        }

        /* Get Dimensions of images and thumbnails on port screen */
        $iDim = $pManager->getImageDimensions($id);
        $tDim = $pManager->getThumbDimensions($id);


        /* Get clients by type */

        //$clientsByType = $this->getPortfolioTable()->getPortfolioByType($sm, $id);
        $portfolioEntity = $pManager->getPortfolioByType($id);
        // Hydrate the result set
        //$portfolioEntity = new HydratingResultSet(new ReflectionHydrator, $this->getPortfolioEntity());
        //$portfolioEntity->initialize($clientsByType);

        /* Total Row Count by portfolio type for the jQuery */
        $totalRows = $pManager->getPortfolioCountByType($id);
        //$totalRows = 5;

        /* Handle the view */
        $view = new ViewModel(array(
            'clients' => $portfolioEntity,
            'totalContent' => $totalRows,
            'iWidth' => $iDim['width'],
            'iHeight' => $iDim['height'],
        ));

        /* Handling database query for a proper ResultSet */
        /*
        $cResultSet = $this->getPortfolioTable()->getHydraPortfolioByType($sm, $id);

        // Hydrate the result set
        $portfolioEntity = new HydratingResultSet(new ReflectionHydrator, $this->getPortfolioEntity());
        $portfolioEntity->initialize($cResultSet);
*/

        $pcView = new ViewModel(array(
            'clients'=>$portfolioEntity,
            'tWidth' => $tDim['width'],
            'tHeight' => $tDim['height'],

        ));
        $portControls = $pcView->setTemplate('portfolio/portfolio/portcontrol.phtml');
        $view->addChild($portControls, 'portcontrol');
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

        $sm = $this->getServiceLocator();
        $clientsByType = $this->getPortfolioTable()->getPortfolioByType($id, $sm);

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