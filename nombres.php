<?php
/**
 * Faire la somme de 2 chiffres (Commentaire de documentation)
 * @param int,float $ch1
 * @param int,float $ch2
 * @return int,float $total
 */
    function somme($ch1,$ch2)
    {
        $result=$ch1+$ch2;
        return $result;
    }
    //CTRL+Q pour avoir le descriptif de la documentation de la fonction
$resultat=somme(17,07);

echo $resultat;
//division
$total_division=12/4;
echo $total_division;
//multiplication
$total_multiplication=12/4;
echo $total_multiplication;
//soustraction
$total_soustraction=12-4;
echo $total_soustraction;
//typage implicite
$typage=10+"vive le php";
//10
$typage=10+"10 vive le php";
//20
$typage=10+"vive les 10 php";
//10
//Incrémentation
//Ajouter +1
$typage+=1;
$typage++; //ou ++$typage pour avoir l'incrémentation en amont
?>