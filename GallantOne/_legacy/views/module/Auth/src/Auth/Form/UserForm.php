<?php

namespace Auth\Form;

use Zend\Form\Annotation;
use Zend\Stdlib\Hydrator\ObjectProperty;

/**
 * @Annotation\Name("userForm")
 * @Annotation\Hydrator("Zend\Stdlib\Hydrator\ObjectProperty")
 */
class UserForm extends BaseUserForm
{

    /**
     * @Annotation\Filter({"name":"StringTrim"})
     * @Annotation\Validator({"name":"Regex", "options":{"pattern":"/^[a-zA-Z][a-zA-Z0-9_-]{0,24}$/"}})
     * @Annotation\Validator({"name":"StringLength", "options":{"min":"2"}})
     * @Annotation\Attributes({"type":"text", "class":"form_input", "placeholder":"First Name"})
     * @Annotation\Options({"label":""})
     */
    public $first_name;

    /**
     * @Annotation\Filter({"name":"StringTrim"})
     * @Annotation\Validator({"name":"Regex", "options":{"pattern":"/^[a-zA-Z][a-zA-Z0-9_-]{0,24}$/"}})
     * @Annotation\Validator({"name":"StringLength", "options":{"min":"2"}})
     * @Annotation\Attributes({"type":"text", "class":"form_input", "placeholder":"Last Name"})
     * @Annotation\Options({"label":""})
     */
    public $last_name;

    /**
     * @Annotation\Filter({"name":"StringTrim"})
     * @Annotation\Validator({"name":"Regex", "options":{"pattern":"/^[a-zA-Z][a-zA-Z0-9_-]{0,24}$/"}})
     * @Annotation\Validator({"name":"Identical", "options":{"token":"password"}})
     * @Annotation\Validator({"name":"StringLength", "options":{"min":"7", "max":"30"}})
     * @Annotation\Attributes({"type":"password", "class":"form_input", "placeholder":"Confirm Password"})
     * @Annotation\Options({"label":""})
     */
    public $confirm_password;


}
