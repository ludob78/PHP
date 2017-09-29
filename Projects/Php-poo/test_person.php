<?php
require_once 'Person.php';
require_once 'Calculette.php';

$toto=new Person();
$toto ->setCodeCountry('DE');
var_dump($toto);
$calculette=new Calculette($toto);
var_dump($calculette);
