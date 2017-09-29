<?php

require_once '../vendor/autoload.php';

$expediteur=isset($_POST['expediteur'])||!empty($_POST['expediteur'])?$_POST['expediteur']:false;
$destinataire=isset($_POST['destinataire'])||!empty($_POST['destinataire'])?$_POST['destinataire']:false;
$message=isset($_POST['message'])||!empty($_POST['message'])?$_POST['message']:false;

if ($expediteur!=false||$destinataire!=false||$message!=false)
{
// Create the Transport
    $transport = (new Swift_SmtpTransport('smtp.carglass.fr', 25))
        ->setUsername('lbarjonnet')
        ->setPassword('Sw@ne13111224')
    ;

    // Create the Mailer using your created Transport
    $mailer = new Swift_Mailer($transport);

    // Create a message
    $message = (new Swift_Message('Test Swift Mailer'))
      ->setFrom($expediteur)
    ->setTo($destinataire)
    ->setBody($message)
        ;

    // Send the message
    $result = $mailer->send($message);
}
header("Location :execute.php?result=".$result);
?>