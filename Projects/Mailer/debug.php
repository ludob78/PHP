<?php
require_once 'vendor/autoload.php';

use Mailer\Services\FormFactory;
FormFactory::$bootstrap=true; //on modifie la variable static sur la classe et non l'instance.
//$form= new \Mailer\Services\FormFactory();

$form=new FormFactory($_POST);

echo "<form action='' method='POST'>";
echo $form->Input('email_expediteur','Email émetteur',['type'=>'text','css'=>'form-control'])."<br><br>";
echo $form->Input('email_destinataire','Email destinataire',['type'=>'text','css'=>'form-control'])."<br><br>";
echo $form->Input('message','Contenu de votre message',['type'=>'textarea','css'=>null])."<br><br>";
echo $form->Submit(['value'=>'Soumettre','css'=>'btn btn-primary']); ?>