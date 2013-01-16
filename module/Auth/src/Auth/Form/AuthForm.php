<?php

namespace Auth\Form;

use Zend\Form\Form;

class AuthForm extends Form
{

    public function __construct($name = null)
    {

        parent::__construct('auth');

        $this->setAttribute('method', 'post');

        /* Login field */
        $this->add(array(
                'name' => 'username',
                'attributes' => array( 'type' => 'text', ),
                'options' => array( 'label' => 'Email', ),
        ));

        /* Password field */
        $this->add(array(
            'name' => 'password',
            'attributes' => array('type' => 'password'),
            'options' => array('label' => 'Password'),
        ));

        $this->add(array(
            'name' => 'submit',
            'attributes' => array(
                'type' => 'submit',
                'value' => 'Login',
                'id' => 'loginButton',
            ),
        ));

    }

}
