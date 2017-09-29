<?php
namespace POO;

use POO\Users\Equipe;
use POO\Users\Person;

class Societe
{
    private $equipe=[];
    //Injection de dépendance. Il est impossible d'instancier un objet de type societe sans lui associer / injecter un objet de type équipe
    public function __construct(Equipe $equipe)
    {
        $this->equipe[]=$equipe;
    }
    public function embaucher(Person $membre){
        $this->equipe->add($membre);
    }
    public function addEquipe(Equipe $equipe){
        $this->equipe[]=$equipe;
    }
}
?>