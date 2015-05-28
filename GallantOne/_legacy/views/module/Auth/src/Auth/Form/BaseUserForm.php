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
     * @Annotation\Attributes({"type":"text", "class":"form_input", "placeholder":"E-mail Address"})
     * @Annotation\Options({"label":""})
     */
    public $email;

    /**
     * @Annotation\Filter({"name":"StringTrim"})
     * @Annotation\Validator({"name":"Regex", "options":{"pattern":"/^[a-zA-Z][a-zA-Z0-9_-]{0,24}$/"}})
     * @Annotation\Attributes({"type":"password", "class":"form_input", "placeholder":"Password"})
     * @Annotation\Validator({"name":"StringLength", "options":{"min":"7", "max":"30"}})
     * @Annotation\Options({"label":""})
     */
    public $password;



    /**
     * @Annotation\Attributes({"type":"submit", "class":"submit_button"})
     */
    public $submit;

}
