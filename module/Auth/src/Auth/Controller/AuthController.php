<?php

namespace Auth\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Auth\AuthManager;
use Zend\Http\Request;
use Zend\Form\Form;
use Auth\Form\UserForm;
use Auth\Form\BaseUserForm;
use Zend\Form\Annotation\AnnotationBuilder;
use Auth\Entity\User;
use Zend\Authentication\Result;
use Zend\Session\Container;

class AuthController extends AbstractActionController
{


    public function getEntityManager()
    {
        if (null === $this->em)
        {
            $this->em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        }
        return $this->em;
    }

    public function initAuthManager()
    {

    }

    public function loginAction()
    {

        /* Build annotation style form */
        $builder = new AnnotationBuilder();
        $form = $builder->createForm(new BaseUserForm());

        $form->get('submit')->setAttribute('value', 'Login');

        $request = $this->getRequest();

        if ($request->isPost()) {
            $form->setData($request->getPost());

            /* Authenticate User */
            $authManager = new AuthManager($this->getServiceLocator());
            $result = $authManager->authUser($form);

            /* User is authenticated */
            if ($result->isValid())  {
                $authUserEmail = $result->getIdentity();

                $gUser = new Container('gUser');
                $gUser->eName = $authUserEmail;

                return $this->redirect()->toRoute('success');
            }

            /* Handle invalid login messages */
            $messages = $this->handleLoginMessages($result);

            return array( 'form' => $form, 'error' => $messages );
        }

        // Get request handling
        return array( 'form' => $form, 'error' => null );
    }

    /**
     * Registration Page
     * @return array
     */
    public function registerAction()
    {

        /* Form Builder */
        $builder = new AnnotationBuilder();
        $form = $builder->createForm(new UserForm());
        $form->get('submit')->setAttribute('value', 'Register');

        $request = $this->getRequest();

        if ($request->isPost())
        {
            //$form->bind(new User());
            $form->setData($request->getPost());

            $user = new User();
            //$form->bind($user);

            /* Doctrine insert from entity */
            if ($form->isValid()) {
                //$form->bindValues();
                $user->populate($form->getData());  // populate User object
                $this->getEntityManager()->persist($user);  // persist object until flush (insert)
                $this->getEntityManager()->flush();

                return $this->redirect()->toRoute('login');
            }
        }

        return array(
            'form' => $form,
        );

    }

    public function successAction() {

        $gUser = new Container('gUser');

        return new ViewModel(array('gUser' => $gUser->eName ));

    }

    private function handleLoginMessages($result)
    {
        $messages = '';
        foreach($result->getMessages() as $message) {
            $messages .= $message."<br>";
        }

        return $messages;
    }
}

