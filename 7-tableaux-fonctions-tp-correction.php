<!doctype HTML>
<html>
<head>
	<meta charset="utf-8">
	<title>Les fonctions de tableaux</title>
</head>
<body>
	<h1>Les fonctions de tableaux</h1>
<?php 

	/**
	*
	* EXERCICE: Recherchez les fonctions Array dans la documentation PHP (php.net) et réalisez les opérations suivantes
	*	
	* 1_ Créez un tableau de type numérique et stockez des valeurs de type entiers 
	* 2_ Comptez le nombre de valeurs stockées dans ce tableau
	* 3_ Affichez la valeur maximale stockée dans ce tableau
	* 4_ Affichez la valeur minimale stockée dans ce tableau
	* 5_ Classez dans un ordre croissant les valeurs de ce tableau. 
	* Affichez votre résulat à l'aide d'une méthode de debug
	* 6_ Classez dans un ordre décroissant les valeurs de ce tableau. 
	* Affichez votre résulat à l'aide d'une méthode de debug
	* 7_ Faites la somme des valeurs de types entiers contenues dans ce tableau, et afficher le résulat contenu dans une variable
	* 8_ Rassemblez les valeurs d'un tableau numérique en une chaîne de caractères avec un espace entre chaque valeur
 	* 9_ Transformez une chaîne de caractères en tableau numérique
 	* 10_ Vérifiez si une valeur existe dans votre tableau in_array (retourne une valeur booléenne)
 	* 11_ Créer un sous-tableau qui contient seulement quelques valeurs d'un tableau principal
 	* 12_ Fusionner deux tableaux en un seul et afficher le 3° tableau avec une méthode de debug
 	* 13_ Comparer deux tableaux et afficher leurs valeurs communes dans un troisième tableau
 	* 14_ Créer un tableau qui contient des valeurs en doublons. Ensuite, affichez ce tableau avec une méthode de débug sans les doublons
	*/
?>
<?php 
// 1_ Créez un tableau de type numérique et stockez des valeurs de type entiers 
	$arrayNum = array (5, 66, 145, 2, 77,599);
?>
	<h2>2_ Comptez le nombre de valeurs stockées dans ce tableau</h2>
	<?php 
	echo "Le tableau $arrayNum contient ".count($arrayNum)." valeurs";
	?>

	<h2>3_ Affichez la valeur maximale stockée dans ce tableau</h2>
	<?php 
	echo "La valeur maximale de ce tableau est ".max($arrayNum);
	?>

	<h2>4_ Affichez la valeur minimale stockée dans ce tableau</h2>
	<?php 
	echo "La valeur minimale de ce tableau est ".min($arrayNum);
	?>

	<h2>5_ Classez dans un ordre croissant les valeurs de ce tableau. </h2>
	<?php 
	echo "Voici le tableau $arrayNum classé par ordre croissant <br />";
	sort($arrayNum);
	?>
	<pre><?php print_r($arrayNum)?></pre>

	<h2>6_ Classez dans un ordre décroissant les valeurs de ce tableau.  </h2>
	<?php 
	echo "Voici le tableau $arrayNum classé par ordre décroissant <br />";
	rsort($arrayNum);
	?>
	<pre><?php print_r($arrayNum)?></pre>

	<h2>7_ Faites la somme des valeurs de types entiers contenues dans ce tableau, et afficher le résulat contenu dans une variable</h2>
	<?php 
	echo "Voici la somme des valeurs contenues dans le tableau : <br />";
	$somme = array_sum($arrayNum);
	echo $somme;
	?>

	<h2>8_ Rassemblez les valeurs d'un tableau numérique en une chaîne de caractères avec un espace entre chaque valeur </h2>
	<?php 
	echo "Voici le tableau $arrayNum sous forme de chaîne de caractères : ";
	$arrayToString = implode($arrayNum, " ");
	echo $arrayToString;
	?>

	<h2>9_ Transformez une chaîne de caractères en tableau numérique</h2>
	<?php 
	echo "Voici ma chaîne de caractères transformées en tableau numérique : ";
	$stringToArray = explode(" ", $arrayToString);
	?>
	<pre> <?php print_r($stringToArray) ;?></pre>

	<h2>10_ Vérifiez si une valeur existe dans votre tableau in_array</h2>
	<?php 
	$valExiste = in_array(145, $stringToArray);
	$valExiste2 = in_array(559, $stringToArray);
	?>
	<p><i>La valeur 145 existe dans mon tableau ?: (1 = oui, non = empty)</i></p>
	<?php echo $valExiste ;?>
	<p><i>La valeur 559 existe dans mon tableau ?: (1 = oui, non = empty)</i></p>
	<!-- Retourne 0 -->
	<?php echo $valExiste2 ;?> 

	<h2>11_ Créer un sous-tableau qui contient seulement quelques valeurs d'un tableau principal</h2>
	<?php
	/**
	* Extraire quelques valeurs d'un tableau dans un autre
	* @param : nom du tableau
	* @param : indice à partir du quel on lit le tableau principal
	* @param : A partir de cet indice, combien d'élements du tableau principal souhaite-on récupérer
	*/
	$sousTableau = array_slice($arrayNum,0,2);
?>
	 <pre><?php print_r($sousTableau)?></pre>

	<h2>12_Fusionner deux tableaux en un seul et afficher le 3° tableau avec une méthode de debug</h2>
	<?php 
	$tab1 = $arrayNum;
	$tab2 = array(55,99,44,2,669,66,5);

	/**
	* Fusionner deux tableaux en 1
	* @param : nom du tableau 1
	* @param : nom du tableau 2
	*/
	$bigTab = array_merge($tab1, $tab2);

	print_r($bigTab);
	?>

	<h2>13_ Comparer deux tableaux et afficher leurs valeurs différentes dans un troisième tableau</h2>

	<?php 
	$tab1= array (5, 66, 145, 2, 77,599);
	$tab2 = array (55,99,44,2,669,66,5);

	$idemTab1 = array_diff($tab1, $tab2);
	// Attention l'ordre des paramètres va compter. Si on passe d'abord le tableau 1, alors la fonction va chercher quelles valeurs ne sont pas dans le tableau 2
	print_r($idemTab1);

	// Si on passe d'abord le  tableau 2, la fonction va chercher quelles valeurs ne sont pas dans le tableau 1
	$idemTab2 = array_diff($tab2, $tab1);
	print_r($idemTab2);

	?>

</body>
</html>