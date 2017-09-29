<?php //print_r ($_POST);?>
<br>
<?php
//echo $_POST['animaux'][0];
//echo $_POST['animaux'][1];
//echo $_POST['animaux'][2];
?>
<br>
<?php
foreach ($_POST as $var) {
    echo $var;
}
?>
<br>
<?php
//print_r($_GET);
foreach ($_GET as $cle => $element) {
    echo $cle . 'vaut' . $element;
}
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>tableaux</title>
</head>
<body>
<form action="" method="post">
    <h2>Quel est votre animal de compagnie préféré ?</h2>
    <div>
    <label for="chat">chat
    <input type="checkbox" value="chat" name="animaux[]" id="chat">
    </label>
        <label for="chien">chien
            <input type="checkbox" value="chien" name="animaux[]" id="chien">
        </label>
        <label for="souris">souris
            <input type="checkbox" value="souris" name="animaux[]" id="souris">
        </label>
    </div>
    <input type="submit">
</form>

<form action="" method="get">
    <h2>Quel sont vos couleurs préférées ?</h2>
    <div>
        <label for="bleu">bleu
            <input type="checkbox" value="bleu" name="couleurs[]" id="bleu">
        </label>
        <label for="blanc">blanc
            <input type="checkbox" value="blanc" name="couleurs[]" id="blanc">
        </label>
        <label for="rouge">rouge
            <input type="checkbox" value="rouge" name="couleurs[]" id="rouge">
        </label>
    </div>
    <input type="submit">


</body>
</html>
