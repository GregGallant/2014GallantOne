<?php

namespace Auth\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Authentication\Adapter\DbTable as AuthAdapter;
//use Auth\Form\AuthForm;
use Zend\Http\Request;
use Zend\Form\Form;
use Auth\Form\UserForm;
use Zend\Form\Annotation\AnnotationBuilder;
use Auth\Entity\User;
use Doctrine\ORM\EntityManager;

class AuthController extends AbstractActionController
{

    protected $authManager;

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

        $sm = $this->getServiceLocator();
        $this->authManager = new AuthManager($sm);
    }

    public function loginAction()
    {

        /*
        $form = new AuthForm();
        $form->setBindOnValidate(false);
        */

        $builder = new AnnotationBuilder();
        $form = $builder->createForm(new UserForm());

        $form->get('submit')->setAttribute('value', 'Login');

        $request = $this->getRequest();

        if ($request->isPost()) {
            //$userCreds = $this->authManager->getUser("username");
            /*
            $authAdapter = new AuthAdapter(
                $dbAdapter, 'user', 'username', 'password'
            );
            */
        }

        //return new ViewModel(array());
        return array(
            'form' => $form,
        );

    }

    /**
     * Registration Page
     * @return array
     */
    public function registerAction()
    {
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
           // $user->populate($form->getData());


            if ($form->isValid()) {
                //$form->bindValues();
                $user->populate($form->getData());
                $this->getEntityManager()->persist($user);
                $this->getEntityManager()->flush();

                return $this->redirect()->toRoute('login');
            }
        }

        return array(
            'form' => $form,
        );

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