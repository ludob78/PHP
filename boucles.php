<?php
/*$infos=array('prenom'=>'Ludovic','nom'=>'Barjonnet','age'=>'34');
foreach ($infos as $label => $info){
    echo "$label:$info <br>";
}*/
//Sans récupérer le label
/*foreach ($infos as  $info){
    echo "$info <br>";
}*/
//votre fichier contient :
//10% d'adresses *@gmail.com
//40% d'adresses *@free.fr
//20% d'adresses *@yahoo.com
//30% d'adresses *@orange.fr

$emails=array(
            "test1@gmail.com","test2@free.fr","test3@free.fr","test4@free.fr","test5@free.fr",
            "test6@yahoo.com","test7@yahoo.com","test8@orange.fr","test9@orange.fr","test10@orange.fr"
              );
$total_emails=count($emails);
$domaines=[];
    foreach ($emails as $email)
        {
            $domaine=explode("@",$email);
            $domaines[]=$domaine[1];
        }
$count_domaines= array_count_values($domaines);
    foreach ($count_domaines as $label => $qte)
        {
        echo round($qte/$total_emails*100)."% d'adresse *@".$label."<br>";
        }
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

</body>
</html>
