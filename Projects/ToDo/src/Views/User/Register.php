<?php
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="Assets\css\bootstrap.min.css">
    <title>Site de To Do List</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-xs-8 col-xs-offset-2 well">
            <h1>Bienvenue sur le site de la To Do List</h1>
            <h2>Merci de vous enregistrer</h2>
            <?php \toDo\Services\ToolBox::getFlash();?>
            <form  action="?action=User/doRegister" method="post">
                <?= $form->Input('login','Votre login',['type'=>'text','css'=>'form-control','require'=>true]);?>
                <?= $form->Input('password','Votre mot de passe',['type'=>'password','css'=>'form-control','require'=>true]);?>
                <?= $form->Input('prenom','Votre prénom',['type'=>'text','css'=>'form-control','require'=>true]);?>
                <?= $form->Input('nom','Votre nom',['type'=>'text','css'=>'form-control','require'=>true]);?>
                <?= $form->Input('email','Votre email',['type'=>'text','css'=>'form-control','require'=>true]);?>
                <?= $form->Submit(['value'=>'Se connecter','css'=>'btn btn-primary pull-right']);?>
            </form>
        </div>
    </div>
</div>

</body>
</html>
