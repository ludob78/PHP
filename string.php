<?php
//chaine de caractère
$prenom="Ludovic";
$nom="Barjonnet";
/*
 * Commentaire multi lignes
 */
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
<!--echo-->
<h1>Bonjour <?php echo $prenom." ".$nom;?>!</h1>
<h1>Bonjour <?= $prenom.' '.$nom;?>!</h1>
<h1>Bonjour <?= '$prenom $nom';?>!</h1>
<h1>Bonjour <?= "$prenom $nom";?>!</h1>
<h1>Bonjour <?= "$prenom";?> <?= "$nom";?>!</h1>
</body>
</html>


