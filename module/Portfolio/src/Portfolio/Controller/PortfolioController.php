<?php
/**
 * Programmed by Greg Gallant
 */
namespace Portfolio\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Portfolio\PortfolioManager;
use Zend\Form\Annotation\AnnotationBuilder;
use Portfolio\Form\ContactForm;
use Application\MailManagerImpl;


/**
 * Web Software/design/logos etc portfolio class controller
 */
class PortfolioController extends AbstractActionController
{

    protected $pManager; // PortfolioManager class
    protected $mailManager;


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

        /* Get Dimensions of images and thumbnails on port screen - throw it in a manager */
        $iDim = $this->pManager->getImageDimensions($id);
        $tDim = $this->pManager->getThumbDimensions($id);


        /* Get clients by type */

        $portfolioEntity = $this->pManager->getPortfolioByType($id);

        /* Total Row Count by portfolio type for the jQuery */
        $totalRows = $this->pManager->getPortfolioCountByType($id);

        /* Height width thumbnails, ugh... throw it in a manager */

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

    /**
     * Contact Form
     */
    public function contactAction()
    {
        $builder = new AnnotationBuilder();
        $form = $builder->createForm(new ContactForm());
        $form->get('submit')->setAttribute('value', 'Send Message');

        $this->mailManager = new MailManagerImpl();

        $request = $this->getRequest();

        if ($request->isPost()) {

            $form->setData($request->getPost());

            if ($form->isValid()) {

                $contact_form = new ContactForm();
                $contact_form->populate($form->getData());

                // TODO: send e-mail (populate ContactForm with $form data
                $error = $this->mailManager->sendContactMail($contact_form);
                if ($error != 1) {
                    return $this->redirect()->toRoute('login');
                }
                return $this->redirect()->toRoute('success');

            }

        }

        return array('form'=>$form,);
    }
}