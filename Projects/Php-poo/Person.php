<?php

class Person
{
    private $login;
    private $password;
    protected $code_country; //accessible à partir des class en héritage mais pas en dehors de la classe Person

    /**
     * @return mixed
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @param mixed $login
     */
    public function setLogin($login)
    {
        $this->login = $login;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @param mixed $code_country
     */
    public function setCodeCountry($code_country)
    {
        $this->code_country = $code_country;
    }

    /**
     * @return mixed
     */
    public function getCodeCountry()
    {
        return $this->code_country;
    }




}