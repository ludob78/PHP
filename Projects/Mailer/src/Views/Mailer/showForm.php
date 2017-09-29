<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="Assets/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-xs-8">
        <h1>Affichage du formulaire pour le mailer</h1>
        <h2>Envoyer un mail à qui vous voulez!</h2>
            <form action="" method="post">
            <?php \Mailer\Services\ToolBox::getFlash(); ?>
            <?php if (!$success): ?>
            <?= $form->Input('email_expediteur','Email émetteur',['type'=>'text','css'=>'form-control','require'=>true])."<br><br>"; ?>
            <?= $form->Input('nom_expediteur','Nom émetteur',['type'=>'text','css'=>'form-control','require'=>false])."<br><br>"; ?>
            <?= $form->Input('email_destinataire','Email destinataire',['type'=>'text','css'=>'form-control','require'=>true])."<br><br>"; ?>
            <?= $form->Input('nom_destinataire','Nom destinataire',['type'=>'text','css'=>'form-control','require'=>false])."<br><br>"; ?>
            <?= $form->Input('sujet','Contenu de votre sujet',['type'=>'text','css'=>'form-control','require'=>false])."<br><br>";?>
            <?= $form->Input('message','Contenu de votre message',['type'=>'textarea','css'=>null,'require'=>true])."<br><br>";?>
            <?= $form->Submit(['value'=>'Soumettre','css'=>'btn btn-primary']); ?>
            <?php endif; ?>
            </form>
        </div>
    </div>

</div>

</body>
</html>

