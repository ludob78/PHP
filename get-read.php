<?php
//Récupérer des données via une url contenant des paramètres grâce à la superglobale $_GET.
print_r($_GET);
//Vérifier si c'est défini et si le champ n'est pas null
//$age=isset($_GET["age"])==true && empty($_GET["age"])==false ?$_GET["age"]:"";
//echo $age;
//echo '<br>';

if (isset($_GET["age"])==false){
$age="âge non défini";
}
elseif (empty($_GET["age"])==true){
    echo "Merci de saisir un âge";
}
else{
//    $age=(int) $_GET["age"]?$_GET["age"]:"Merci de saisir un âge valide";
    $age=is_numeric( $_GET["age"])?$_GET["age"]:"Merci de saisir un âge valide";
}
echo '<br>';
//echo $age;
$prenom=isset($_GET["prenom"])?$_GET["prenom"]:null;
echo '<br>';

$passions=isset($_GET["passions"])
//&&(count($_GET["passions"])!=1 && empty($_GET["passions"][0])==false)
    ?$_GET["passions"]:array();
/*foreach ($passions as $passion){
    echo $passion.'<br>';
}*/

?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Traitement PHP</title>
</head>
<body>
<h1>Bienvenue <?= ucfirst($prenom)?></h1>
<h2>Vos passions</h2>
<?php if ($passions==false) :?>
<p style="color: red;">Vous devez saisir au moins une passion!</p>
<?php else :?>
    <?php foreach ($passions as $passion):?>
        <ul>
            <li><?php echo $passion; ?></li>
        </ul>
    <?php endforeach ?>
<?php endif ?>
</body>
</html>
