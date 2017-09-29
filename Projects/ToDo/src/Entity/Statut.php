<?php
/**
 * Created by PhpStorm.
 * User: stagiaire
 * Date: 13/06/2017
 * Time: 09:19
 */

namespace toDo\Entity;


class Statut
{
    private $id_statut;
    private $libelle;

    public function __toString()
    {
        // TODO: Implement __toString() method.
        return $this->getLibelle();
    }

    //à utiliser pour le cas où l'instance serait appelée dans le service Formfactory et la méthode Select()
    public function getValue(){
        return $this->getIdStatut();
    }

    /**
     * @return mixed
     */
    public function getIdStatut()
    {
        return $this->id_statut;
    }

    /**
     * @param mixed $id_statut
     */
    public function setIdStatut($id_statut)
    {
        $this->id_statut = $id_statut;
    }

    /**
     * @return mixed
     */
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * @param mixed $libelle
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;
    }


}