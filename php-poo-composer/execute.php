<?php
//Ici chargement de l'autoloader
require_once 'vendor/autoload.php';

//Appel des class pour effectuer nos différents tests
/*
$titi=new \POO\Users\Person("titi");
$toto=new \POO\Users\Person("toto");
$tata=new \POO\Users\Person("tata");

$equipe=new \POO\Users\Equipe();

$equipe->add($titi);
$equipe->add($toto);
$equipe->add($tata);


foreach ($equipe->getMembre() as $membre){
    echo "Prénom: {$membre->getPrenom()}<br />";
}

$societe=new \POO\Societe($equipe);
var_dump($societe);
//var_dump($titi);
*/

$titi=new \POO\Users\Person("titi");
$tutu=new \POO\Users\Person("tutu");
$equipe=new \POO\Users\Equipe();
$equipe->add($titi);

$societe=new \POO\Societe($equipe);
$equipe2=new \POO\Users\Equipe($tutu);
$societe->addEquipe($equipe2);
$equipe2->add($tutu);
var_dump($societe);