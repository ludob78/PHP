<!doctype HTML>
<html>
<head>
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
	* 5_ Générez un nomree aléatoire entre 15 et 800
	* 6_ Arrondissez la valeur de $float
	* 7_ Arrondissez au nombre supérieur la valeur de $float
	* 8_ Arrondissez au nombre inférieur la valeur de $float
	*
	*/
    //1_
    $chaine="-24";
    echo abs($chaine);
    echo"<br/>";
    //2_
    $chaine="24";
    echo sqrt($chaine);
    echo"<br/>";
    //3_
    $chaine1="24.67";
    $chaine2="1";
    echo fmod($chaine1,$chaine2);
    echo"<br/>";
//    OU
    $chaine=$chaine1%$chaine2;
    echo $chaine;
    echo"<br/>";
    //4_
    echo rand();
    echo"<br/>";
    //5_
    echo rand(15,800); //ou uniqid()
    echo"<br/>";
    //6_
    $chaine="24.43";
    echo round($chaine); ;
    echo"<br/>";
    //7_
    $chaine="24.43";
    echo ceil($chaine);
    echo"<br/>";
    //8_
    $chaine="24.43";
    echo floor($chaine);
    echo"<br/>";
	?>

	
</body>
</html>