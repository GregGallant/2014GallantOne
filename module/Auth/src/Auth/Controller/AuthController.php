<?php

namespace Auth\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Authentication\Adapter\DbTable as AuthAdapter;
//use Auth\Form\AuthForm;
use Auth\AuthManager;
use Zend\Http\Request;
use Zend\Form\Form;
use Auth\Form\UserForm;
use Auth\Form\BaseUserForm;
use Zend\Form\Annotation\AnnotationBuilder;
use Auth\Entity\User;
use Doctrine\ORM\EntityManager;
use Zend\Authentication\Result;

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

        /*
        $form = new AuthForm();
        $form->setBindOnValidate(false);
        */



        $builder = new AnnotationBuilder();
        $form = $builder->createForm(new BaseUserForm());

        $form->get('submit')->setAttribute('value', 'Login');

        $request = $this->getRequest();

        if ($request->isPost()) {
            $form->setData($request->getPost());


            $authManager = new AuthManager($this->getServiceLocator());
            $result = $authManager->authUser($form);

            if ($result->isValid())  {
                $someId = $result->getIdentity();
                return $this->redirect()->toRoute('success');
            }

            /* Handle invalid login */
            $messages = '';
            foreach($result->getMessages() as $message) {
                $messages .= $message."<br>";
            }
            return array( 'form' => $form, 'error' => $messages );
        }

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

        return new ViewModel();

    }
}

/*

use Zend\Authentication\Adapter\DbTable as AuthAdapter;

// Configure the instance with constructor parameters...
$authAdapter = new AuthAdapter($dbAdapter,
                               'users',
                               'username',
                               'password'
                               );

// ...or configure the instance with setter methods
$authAdapter = new AuthAdapter($dbAdapter);

$authAdapter
    ->setTableName('users')
    ->setIdentityColumn('username')
    ->setCredentialColumn('password')
;


 */