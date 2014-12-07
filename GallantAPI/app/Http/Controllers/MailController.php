<?php

class MailController extends BaseController {

    /**
     * index 
     * 
     * @access public
     * @return void
     */
    public function index()
    {

        /* Using SwiftMail */
        $subject = "MailController Test - Do Not Reply.";
        $from = 'mechagreg@gallantone.com';
        $myname = "Mecha Greg";

        $message = Swift_Message::newInstance()
            ->setSubject($subject)
            ->setTo('ggallant@northpointdigital.com')
            ->setFrom($from)
            ->setSender($from)
            ->setBody('I am alive.');

        $transport = Swift_MailTransport::newInstance();

        $mailer = Swift_Mailer::newInstance($transport);
        $mailer->send($message);

        return View::make('mail');
    }

}
