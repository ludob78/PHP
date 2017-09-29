<?php
//Importer la/les class

require_once 'User.php';

$titi= new User();
$titi ->setEmail("titi@gmail.com");
$titi ->setPassword("1549895464");
$titi ->setAge(18);
$titi->setCountry("DE");
echo $titi->displayPriceTTC(100);

var_dump($titi);


$toto= new User();
$toto ->setEmail("toto@gmail.com");
$toto ->setPassword("131351234");
$toto->setCountry("FR");
echo $toto->displayPriceTTC(100);


var_dump($toto);

//echo $toto->getPassword();


?>