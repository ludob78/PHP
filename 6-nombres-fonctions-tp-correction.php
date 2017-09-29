<!doctype HTML>
<html>
<head>
	<meta charset="utf-8">
	<title>
		Fonctions utiles sur les nombres
	</title>
</head>
<body>
	<?php 
	/**
	*
	* EXERCICE: rercher les fonctions "math" dans la documentation de PHP (php.net) et réaliser les opérations suivantes
 	* 
	*
	* 1_ Affichez la valeur absolue d'un nombre
	* 2_ Calculez la racine carré d'un nombre
	* 3_ Affichez le reste d'une division (modulo)
	* 4_ Générez un nombre aléatoire
	* 5_ Générez un nombre aléatoire entre 15 et 800
	* 6_ Arrondir la valeur d'un nombre de type float
    * 7_ Arrondir la valeur d'un nombre de type float à l'entier supérieur
    * 8_ Arrondir la valeur d'un nombre de type float à l'entier inférieur
	*/


	?>

	<h2>Afficher la valeur absolue d'un nombre</h2>
	<?php 
	$abs = -55;
	echo "la valeur absolue de -55 = ";
	echo abs($abs);
	?>

	<h2>Calculer la racine carré d'un nombre</h2>
	<?php 
	$rc = 9;
	echo "la racine carré de 9 = ";
	echo sqrt($rc);
	?>

	<h2>Afficher le reste d'une division</h2>
	<?php 
	$nb1 = 9;
	$nb2 = 2;
	echo "le modulo de la division de 9/2 = ";
	echo fmod($nb1, $nb2);
	// ou bien
	echo $nb1%$nb2;
	?>

	<h2>Générer un nombre aléatoire</h2>
	<?php 
	
	echo "Mon nombre aléatoire = ";
	echo rand();
	?>

	<h2>Générer un nombre aléatoire entre 15 et 800</h2>
	<?php 
	echo "Mon nombre aléatoire = ";
	echo rand(15,800);
	?>

	 <h2>Arrondir un float</h2>
     <?php 
        
     $float = 5.3;
     echo round($float);
     ?>
     
     <h2>Arrondir un float à l'entier supérieur</h2>
     <?php 
        
     $float = 5.3;
     echo ceil($float);
        
     ?>
     
     <h2>Arrondir un float à l'entier inférieur</h2>
     <?php 
        
     $float = 5.3;
     echo floor($float);
        
     ?>
     <h2>Bonus: Générer un nombre unique</h2>
     <?php 
        
     $uniq_id = uniqid();
     echo $uniq_id;
        
     ?>




	
</body>
</html>