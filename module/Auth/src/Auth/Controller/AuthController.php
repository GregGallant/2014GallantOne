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
use Exception;

define("PASSWORD_LENGTH", 8);

class AuthController extends AbstractActionController
{

    protected $em;
    protected $authManager;


    public function getEntityManager()
    {
        if (null === $this->em)
        {
            $this->em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        }
        return $this->em;
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
            $form->setData($request->getPost());

            $user = new User();


            /* Doctrine insert from entity */
            if ($form->isValid()) {


                    $this->em = $this->getEntityManager();
                    // Check password and confirm password

                    $user->populate($form->getData());  // populate User object

                    $authManager = new AuthManager($this->getServiceLocator());
                    $user = $authManager->encryptPassword($user);
                    //$user = $this->encryptPassword($user);

                    /* Set standardized Data */
                    $user->setStatus(1); // Active User
                    $user->setAclRoleId(1); // guest
                    //$user->setCreateDate("2012-11-10 11:11:11");
                    //$user->setExpireDate("9999-11-10 11:11:11");
                    $this->em->persist($user);  // persist object until flush (insert)
                    $this->em->flush();

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

    public function logoutAction()
    {

        $gUser = new Container('gUser');
        if ($gUser->offsetExists("eName")) {
            $gUser->offsetUnset("eName");
        }

        return $this->redirect()->toRoute('application');

    }

    private function handleLoginMessages($result)
    {
        $messages = '';
        foreach($result->getMessages() as $message) {
            $messages .= $message."<br>";
        }

        return $messages;
    }

    private function encryptPassword($user)
    {
        $uPassword = $user->getPassword();

        $algorithm = MCRYPT_BLOWFISH;
        $mode = MCRYPT_MODE_CFB;
        $salt = $this->generateSalt();
        $user->setSalt($salt);

        $iv_size = mcrypt_get_iv_size($algorithm, $mode);
        $iv = mcrypt_create_iv($iv_size, MCRYPT_DEV_URANDOM);
        $iv = "GregGallant";
        $mpass = trim(base64_encode(mcrypt_encrypt($algorithm, $salt, $uPassword, $mode, $iv)));
        $user->setPassword($mpass);

        return $user;
    }

    private function generateSalt()
    {
        $password = "";
        $possible = "8327649bcdfxhjkmnprqtvwgzyBCDFGHJQLMNPKRTVWXZY";

        $maxlength = strlen($possible);

        if (PASSWORD_LENGTH > $maxlength) {
            $length = $maxlength; // uhm, what's are length?  Fix this a bit.
        } else {
            $length = PASSWORD_LENGTH;
        }

        $i = 0;

        while ($i < $length) {
            // pick a random character from the possible
            $char = substr($possible, mt_rand(0,$maxlength-1), 1);
            if (!strstr($password, $char)) {
                $password .= $char;
                $i++;
            }
        }

        return $password;
    }

}

