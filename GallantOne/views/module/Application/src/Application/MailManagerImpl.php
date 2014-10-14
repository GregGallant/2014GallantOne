<?php

namespace Application;

use Zend\Mail\Message;
use Zend\Mail\Transport\Sendmail as SendMailTransport;
use Portfolio\Form\ContactForm;

define("GALLANTMAIL", "greggallant2011@gmail.com");

class MailManagerImpl implements MailManager
{

    public function sendContactMail($contactForm)
    {
        if (!$contactForm instanceof ContactForm)
        {
            throw new \Exception;
        }

        $message = new Message();

        $message->addFrom($contactForm->getEmail(), $contactForm->getName())
            ->addTo(GALLANTMAIL)
            ->setSubject("GALLANTONE.com CLIENT: ".$contactForm->getSubject());

        $message->setBody($contactForm->getMessage());
        $message->addReplyTo(GALLANTMAIL, "Greg Gallant");
        $message->setEncoding("UTF-8");

        $transport = new SendMailTransport();
        try {
            $transport->send($message);
        } catch(\Exception $e) {
            throw new \Exception("Send mail fail: ".$e->getMessage());
            //return $e->getMessage(); // please log this...
        }

    }

}