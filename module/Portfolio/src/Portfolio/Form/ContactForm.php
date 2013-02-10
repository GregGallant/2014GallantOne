<?php

namespace Portfolio\Form;

use Zend\Form\Annotation;
use Zend\Stdlib\Hydrator\ObjectProperty;

/**
 * @Annotation\Name("contactForm")
 * @Annotation\Hydrator("Zend\Stdlib\Hydrator\ObjectProperty")
 */
class ContactForm
{

    /**
     * @Annotation\Filter({"name":"StringTrim"})
     * @Annotation\Validator({"name":"Regex", "options":{"pattern":"/^[a-zA-Z][a-zA-Z0-9_-]{0,24}$/"}})
     * @Annotation\Validator({"name":"StringLength", "options":{"min":"2"}})
     * @Annotation\Attributes({"type":"text"})
     * @Annotation\Options({"label":"Full Name"})
     */
    public $name;

    /**
     * @Annotation\Validator({"name":"EmailAddress"})
     * @Annotation\Attributes({"type":"text"})
     * @Annotation\Options({"label":"Email"})
     */
    public $email;

    /**
     * @Annotation\Filter({"name":"StringTrim"})
     * @Annotation\Validator({"name":"Regex", "options":{"pattern":"/^[a-zA-Z][a-zA-Z0-9_-]{0,24}$/"}})
     * @Annotation\Validator({"name":"StringLength", "options":{"min":"2"}})
     * @Annotation\Attributes({"type":"text"})
     * @Annotation\Options({"label":"Subject"})
     */
    public $subject;

    /**
     * @Annotation\Filter({"name":"StringTrim"})
     * @Annotation\Validator({"name":"StringLength", "options":{"min":"2"}})
     * @Annotation\Attributes({"type":"textarea"})
     * @Annotation\Options({"label":"Message"})
     */
    public $message;

    /**
     * @Annotation\Attributes({"type":"submit"})
     */
    public $submit;


    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setMessage($message)
    {
        $this->message = $message;
    }

    public function getMessage()
    {
        return $this->message;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setSubject($subject)
    {
        $this->subject = $subject;
    }

    public function getSubject()
    {
        return $this->subject;
    }

    public function setSubmit($submit)
    {
        $this->submit = $submit;
    }

    public function getSubmit()
    {
        return $this->submit;
    }
}