<?php

namespace Auth\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Auth\Form\AuthForm;
//use Auth\Entity\Auth;
use Doctrine\ORM\EntityManager;

class AuthController extends AbstractActionController
{

    public function loginAction()
    {

        $form = new AuthForm();
        $form->setBindOnValidate(false);
        //$form->get('submit')->setAttribute('value', 'Login');

        $request = $this->getRequest();
        if ($request->isPost()) {
            ;
        }
        //return new ViewModel(array());
        return array(
            'form' => $form,
        );
    }


}