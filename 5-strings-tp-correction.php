<!doctype HTML>
<html>
<head>
	<meta charset="utf-8">
	<title> Les principales fonctions des chaînes de caractères</title>
</head>
<body>

	<?php 
	/** Voici un première exemple de fonction de chaîne de caractère
	* Objectif: Transformer toutes les lettres d'une chaîne en majuscule
	*/

	$minToMaj = "voiture";

	echo "<h2>Objectif: Transformer toutes les lettres d'une chaîne en majuscule</h2>";
	echo $minToMaj."<br />";
	echo "devient => ";
	echo strtoupper($minToMaj);

	echo "<hr>";
	$lenght = "je suis";
	echo strlen($lenght);

	?>

	Exercice:
	<?php 
	/**
	* En vous référent à la documentation en ligne de PHP (php.net), transformer les chaines de caractères suivantes
	* selon les directives indiquées
	*
	*
	* 1_ Transformer une chaîne en majuscule en minuscule
	* 2_ Transformer en majuscule le premier caractère d'une chaîne
	* 3_ Transformer en majuscule le premier caractère de chaque mot d'une chaîne
	* 4_ Calculer le nombre de caractère présents dans une chaîne
	* 5_ Supprimer les espaces en début et fin d'une chaîne
	* 6_ Supprimer la lettre ou le mot de votre choix dans une chaîne
	* 7_ Remplacer des caractères présents dans une chaîne par d'autres caractères
	*
	*
	*
 	*/
	?>

	<h2>1_ Transformer une chaîne en majuscule en minuscule</h2>
	<?php 
	$majToMin = "VOITURE"; 
	echo $majToMin."<br />" ;
	echo "devient => " ;
	echo strtolower($majToMin) ;

	?>

	<h2>2_ Transformer en majuscule le premier caractère d'une chaîne </h2>
	<?php
	$firstLetterMaj = "voiture";
	echo $firstLetterMaj."<br />" ;
	echo "devient => " ;
	echo ucfirst($firstLetterMaj) ;
	?>

	<h2>3_ Transformer en majuscule le premier caractère de chaque mot d'une chaîne </h2>
	<?php
	$firstLetterWordsMaj = "je suis allée au cinéma";
	echo $firstLetterWordsMaj."<br />" ;
	echo "devient => " ;
	echo ucwords($firstLetterWordsMaj) ;
	?>

	<h2>4_ Calculer le nombre de caractère présents dans une chaîne </h2>
	<?php
	$countCars = "je suis allée au cinéma";
	echo $countCars."<br />" ;
	echo "contient " ;
	echo strlen($countCars)." caractères incluant les espaces" ;
	?>

	<h2>5_ Supprimer les espaces en début et fin d'une chaîne (voir code source) </h2>
	<?php
	$delSpace = "     je suis allée au cinéma.     ";
	echo $delSpace."<br />" ;
	echo "devient => <br />" ;
	echo trim($delSpace);
	?>

	<h2>6_ Supprimer la lettre ou le mot de votre choix dans une chaîne</h2>
	<?php
	$delLetter = "je suis allée au cinéma.";
	echo $delLetter."<br />" ;
	echo "devient => <br />" ;
	echo trim($delLetter,"je");
	?>

	<h2>6Bis_ Supprimer la première lettre d'une chaîne</h2>
	<?php 
	$delFirstLetter = "mikado";
	echo $delFirstLetter."<br />" ;
	echo "devient => <br />" ;
	echo substr($delFirstLetter, 1);


	  ?>

	<h2>7_ Remplacer des caractères présents dans une chaîne par d'autres caractères</h2>
	<?php
	$ReplaceCars = "je suis allée au cinéma.";
	echo $ReplaceCars."<br />" ;
	echo "devient => <br />" ;
	echo str_replace("suis allée", "pars", $ReplaceCars);
	?>



</body>
</html>