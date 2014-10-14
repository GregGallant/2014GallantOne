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
     * @Annotation\Validator({"name":"StringLength", "options":{"min":"2"}})
     * @Annotation\Attributes({"type":"text", "class":"form_input", "placeholder":"Full Name"})
     * @Annotation\Options({"label":""})
     */
    public $name;

    /**
     * @Annotation\Validator({"name":"EmailAddress"})
     * @Annotation\Attributes({"type":"text"})
     * @Annotation\Attributes({"type":"text", "class":"form_input", "placeholder":"Email Address"})
     * @Annotation\Options({"label":""})
     */
    public $email;

    /**
     * @Annotation\Filter({"name":"StringTrim"})
     * @Annotation\Validator({"name":"StringLength", "options":{"min":"2"}})
     * @Annotation\Attributes({"type":"text", "class":"form_input", "placeholder":"Subject"})
     * @Annotation\Options({"label":""})
     */
    public $subject;

    /**
     * @Annotation\Filter({"name":"StringTrim"})
     * @Annotation\Validator({"name":"StringLength", "options":{"min":"2"}})
     * @Annotation\Attributes({"type":"textarea", "class":"form_textarea", "placeholder":"Project Details"})
     * @Annotation\Options({"label":""})
     */
    public $message;

    /**
     * @Annotation\Attributes({"type":"submit", "class":"submit_button"})
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

    public function populate($form)
    {
        $this->setName($form['name']);
        $this->setEmail($form['email']);
        $this->setSubject($form['subject']);
        $this->setMessage($form['message']);
    }
}