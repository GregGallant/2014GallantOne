<?php

namespace Auth\Form;

use Zend\Form\Annotation;
use Zend\Stdlib\Hydrator\ObjectProperty;

/**
 * @Annotation\Name("baseUserForm")
 * @Annotation\Hydrator("Zend\Stdlib\Hydrator\ObjectProperty")
 */
class BaseUserForm
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
     * @Annotation\Filter({"name":"StringTrim"})
     * @Annotation\Validator({"name":"Regex", "options":{"pattern":"/^[a-zA-Z][a-zA-Z0-9_-]{0,24}$/"}})
     * @Annotation\Attributes({"type":"password"})
     * @Annotation\Options({"label":"Password"})
     */
    public $password;

    /**
     * @Annotation\Filter({"name":"StringTrim"})
     * @Annotation\Validator({"name":"Regex", "options":{"pattern":"/^[a-zA-Z][a-zA-Z0-9_-]{0,24}$/"}})
     * @Annotation\Attributes({"type":"text"})
     * @Annotation\Options({"label":"First Name"})
     */

    /**
     * @Annotation\Attributes({"type":"submit"})
     */
    public $submit;

}
