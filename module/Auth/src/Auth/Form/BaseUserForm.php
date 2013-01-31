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
     * @Annotation\Validator({"name":"StringLength", "options":{"min":"7", "max":"30"}})
     * @Annotation\Options({"label":"Password"})
     */
    public $password;

    /**
     * @Annotation\Filter({"name":"StringTrim"})
     * @Annotation\Validator({"name":"Regex", "options":{"pattern":"/^[a-zA-Z][a-zA-Z0-9_-]{0,24}$/"}})
     * @Annotation\Validator({"name":"Identical", "options":{"token":"password"}})
     * @Annotation\Validator({"name":"StringLength", "options":{"min":"7", "max":"30"}})
     * @Annotation\Attributes({"type":"password"})
     * @Annotation\Options({"label":"Confirm Password"})
     */
    public $confirm_password;

    /**
     * @Annotation\Attributes({"type":"submit"})
     */
    public $submit;

}
