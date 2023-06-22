<?php

namespace App\Notification;

use App\Helper\CensuratorService;
use App\Helper\HelperService;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

class NotificationService
{
    private $mailer;
    private $helperService;

    private $censuratorService;

    public function __construct(
        MailerInterface $mailer,
        HelperService $helperService,
        CensuratorService $censuratorService
    )
    {
        $this->mailer = $mailer;
        $this->helperService = $helperService;
        $this->censuratorService = $censuratorService;
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
            ->text( $this->censuratorService->purify("Sending  fuck emails is fun again! fucking kahoot merde je m'a gouré chef "))
            ->html('<p><h1>New Wish </h1><p>Un wish crée par '. $user->getEmail() .'</p></p>');

//        $this->helperService->helpUser("A mail will be sent");


        $this->mailer->send($email);
    }
}