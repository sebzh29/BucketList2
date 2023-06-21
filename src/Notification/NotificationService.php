<?php

namespace App\Notification;

use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

class NotificationService
{
    private $mailer;

    public function __construct(MailerInterface $mailer)
    {
        $this->mailer = $mailer;
    }

    public function SendMailWishCreation($senderMail, $receiverMail, $user) {
//        dump("Je viens de send un mail au boss");
        $email = (new Email())
            ->from($senderMail)
            ->to($receiverMail)
            //->cc('cc@example.com')
            //->bcc('bcc@example.com')
            //->replyTo('fabien@example.com')
            //->priority(Email::PRIORITY_HIGH)
            ->subject('Un nouveau souhait de créé')
            ->text('Sending emails is fun again!')
            ->html('<p><h1>New Wish </h1><p>Un wish crée par '. $user->getEmail() .'</p></p>');

    $this->mailer->send($email);
    }
}