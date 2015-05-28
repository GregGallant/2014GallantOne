<?php

namespace Application;

use Zend\Mail\Message;

Interface MailManager
{

    public function sendContactMail($contactForm);

}