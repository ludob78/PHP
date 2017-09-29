<?php
require_once '../vendor/autoload.php';
require_once 'FormFactory.php';

$result_email=isset($_GET['result'])||!empty($_GET['result'])?$_GET['result']:false;

//Fatal error: Class 'FormFactory' not found in /volume1/web/cours/PHP/mailer/src/execute.php on line 4
$label_expediteur=new FormFactory;
$input_expediteur=new FormFactory;
$label_destinataire=new FormFactory;
$input_destinataire=new FormFactory;
$label_message=new FormFactory;
$textarea_message=new FormFactory;
$input_submit=new FormFactory;
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>Voici le formulaire Mailer</h1>

<form action="swift_send.php" method="post">
    <?php $label_expediteur->Label("expediteur","Adresse de l'expéditeur");?>
    <?php $input_expediteur->Input('text','expediteur');?>
    <br><br>
    <?php $label_destinataire->Label("destinataire","Adresse du destinataire");?>
    <?php $input_destinataire->Input('text','destinataire'); ?>
    <br><br>
    <?php $label_message->Label("message","message à émettre");?>
    <?php $textarea_message->TextArea('message'); ?>
    <br><br>
    <?php $input_submit->Input('submit','valider','Soumettre'); ?>
</form>

<?= $result_email?>
</body>
</html>
