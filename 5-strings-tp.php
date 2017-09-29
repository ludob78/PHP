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
	* 4_ Calculer le nombre de caractère présent dans une chaîne
	* 5_ Supprimer les espaces en début et fin d'une chaîne
	* 6_ Supprimer la première lettre d'une chaîne
	* 7_ Remplacer des caractères présents dans une chaîne par d'autres caractères
	*
	*
	*
 	*/
	//1_
    echo"<br/>";
    $chaine="J'ADORE LE PHP";
    echo strtolower($chaine);
    //2_
    echo"<br/>";
    $chaine="J'ADORE LE PHP";
    echo ucfirst(strtolower($chaine));
    echo"<br/>";
    //3_
    $chaine="J'ADORE LE PHP";
    echo ucwords(strtolower($chaine));
    echo"<br/>";
    //4_
    $chaine="J'ADORE LE PHP";
    echo strlen($chaine);
    echo"<br/>";
    //5_
    $chaine=" J'ADORE LE PHP ";
    echo trim($chaine);
    echo"<br/>";
    //6_
    $chaine="J'ADORE LE PHP";
    echo substr_replace($chaine,"",0,1);
    echo"<br/>";
    //7_
    $chaine="J'ADORE LE PHP";
    echo strtr($chaine,"E","3");
    echo"<br/>";

	?>

</body>
</html>