<?php

namespace POO\Users;
use POO\Users\Person as P;

class Equipe
{
    private $membres=[];
    //ajouter une personne à l'équipe (instance de la class Person) à l'équipe
    //Injection de dépendance sur la méthode add(),
    //obligation d'injecter une instance de type Person, sinon une erreur se déclenche
    public function add(P $person){
        $this->membres[]=$person;
    }

    /**
     * récupérer les membres de l'équipe, tableau avec un membre à chaque indice
     * @return array
     */

    public function getMembre(){
        return $this->membres;
    }
}
?>
