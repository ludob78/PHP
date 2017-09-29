<?php

namespace POO\Users;

class Person
{
    private $prenom;

    public function __construct($prenom)
    {
        $this->prenom=$prenom;
    }

    /**
     * @return mixed
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @param mixed $prenom
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

}
?>