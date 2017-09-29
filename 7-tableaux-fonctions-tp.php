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
	* 8_ Rassemblez les valeurs d'un tableau numérique en une chaîne de caractères
 	* 9_ Transformez une chaîne de caractères en tableau numérique
 	* 10_ Vérifiez si une valeur existe dans votre tableau (! retourne une valeur booléenne)
 	* 11_ Créer un sous-tableau qui contient seulement quelques valeurs d'un tableau principal
 	* 12_ Fusionner deux tableaux en un seul
 	* 13_ Comparer deux tableaux et afficher leurs valeurs différentes dans un troisième tableau
 	* 14_ Créer un tableau qui contient des valeurs en doublons. Ensuite, affichez ce tableau avec une méthode de débug sans les doublons
	*/

    //1_
	$tableaux=array(8,9,7,5,6,3,4);
	print_r( $tableaux);
	echo '<br>';
	//2_
    echo count($tableaux); //ou sizeof($tableaux);
    echo '<br>';
    //3_
    echo max($tableaux);
    echo '<br>';
    //4_
    echo min($tableaux);
    echo '<br>';
    //5_
    $tableau=sort($tableaux);//asort() conserve l'association des index
    foreach ($tableaux as $key => $val) {
        echo "tableaux[" . $key . "] = " . $val . "\n";
    }
//    echo $tableau;
//    print_r($tableau);
    echo '<br>';
    //6_
    rsort($tableaux);
    foreach ($tableaux as $key => $val) {
        echo "tableaux[" . $key . "] = " . $val . "\n";
    }
    echo '<br>';
    //7_
    $somme= array_sum($tableaux);
    echo $somme;
    echo '<br>';
    //8_
    echo implode($tableaux," ");
    echo '<br>';
    //9_
    $tableau=explode(",","4,5,6,8,7,4,5,6");
    print_r($tableau);
    echo '<br>';
    //10_
//     $result=array_search(5,$tableaux); //renvoi l'index du tableau
     $result=in_array(5,$tableaux);
    echo $result;
     echo '<br>';
     //11_
    $tableaux=array(8,9,7,5,array(12,7,56,8),3,4);
    print_r($tableaux);
    echo '<br>';
    //12_
    $tableau1=array("tableau1",5,"1",4.56);
    $tableau2=array("tableau2",8,"6",6.47);
    $result=array_merge($tableau1,$tableau2);
    print_r($result);
    echo '<br>';
    //13_
    $tableau1=array("tableau",5,"1",4.56);
    $tableau2=array("tableau",8,"1",6.47);
    $result1=array_diff($tableau1,$tableau2);
    $result2=array_diff($tableau2,$tableau1);
    $result=array_merge($result1,$result2);
    print_r($result);
    echo '<br>';
    //14_
    $tableau=array(8,9,7,8,2,5,3,3,4,2,6);
    $result=array_unique($tableau);
    print_r($result);
?>

</body>
</html>