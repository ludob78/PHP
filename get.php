<?php
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>La variable superglobale $_GET</title>
</head>
<body>
<a href="get-read.php?prenom=toto&nom=barjonnet">Qui est là?</a>

<form action="get-read.php" method="get">
    <div>
        <label for="age">Votre âge</label>
        <input type="text" id="age" name="age">
    </div>
    <br>
    <div>
        <label for="passions">Passions?</label> <br>
        <select name="passions[]" multiple="multiple" id="passions">
<!--            <option value=""></option>-->
            <option value="foot">Sport</option>
            <option value="cinema">Cinéma</option>
            <option value="dev">Développement</option>
        </select>
    </div>
    <br>
    <input type="submit">
</form>

</body>
</html>
