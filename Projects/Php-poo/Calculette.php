<?php

/**
 * Created by PhpStorm.
 * User: stagiaire
 * Date: 06/06/2017
 * Time: 10:41
 */
class Calculette extends Person
{
    //Injection de dépendance (instancier une class en fonction d'une autre)
    public function __construct(Person $person)
    {
        $res=$this->getCodeCountry();
        echo $res;
        //$login est privé dans la class parent donc on ne peut pas la redéfinir
        //$this->login="toto";
        //$code_country est protected, donc la class enfant peut redéfinir la valeur
//          $this->code_country='FR';

//        $this->code_country=$this->getCodeCountry();
    }

}