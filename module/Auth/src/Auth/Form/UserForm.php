<?php

namespace Auth\Form;

use Zend\Form\Annotation;
use Zend\Stdlib\Hydrator\ObjectProperty;

/**
 * @Annotation\Name("userForm")
 * @Annotation\Hydrator("Zend\Stdlib\Hydrator\ObjectProperty")
 */
class UserForm
{

    /**
     * @Annotation\Exclude()
     */
    public $id;

    /**
     * @Annotation\Validator({"name":"EmailAddress"})
     * @Annotation\Attributes({"type":"text"})
     * @Annotation\Options({"label":"Email"})
     */
    public $email;

    /**
     * @Annotation\Attributes({"type":"password"})
     * @Annotation\Options({"label":"Password"})
     */
    public $password;

    /**
     * @Annotation\Attributes({"type":"text"})
     * @Annotation\Options({"label":"First Name"})
     */
    public $first_name;

    /**
     * @Annotation\Attributes({"type":"text"})
     * @Annotation\Options({"label":"Last Name"})
     */
    public $last_name;

    /**
     * @Annotation\Attributes({"type":"submit"})
     */
    public $submit;


}
