<?php
namespace App\Notification;

use App\Entity\Contact;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Twig\Environment;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;


class ContactNotification
{

    private $mailer;





    public function __construct(MailerInterface $mailer, Environment $renderer)
    {
        $this->mailer = $mailer;
        $this->renderer = $renderer;
    }


    public function notify(Contact $contact)
    {
        $email = (new TemplatedEmail())
            ->from('noreply@agence.fr')
            ->to('contact@agence.fr')
            ->subject('Agence : ' . $contact->getProperty()->getTitle())
            ->replyTo($contact->getEmail())
            ->htmlTemplate('emails/contact.html.twig')
            ->context(['contact' => $contact]);
        $this->mailer->send($email);



    }

}
























