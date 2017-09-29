<?php
/**
 * Created by PhpStorm.
 * User: stagiaire
 * Date: 12/06/2017
 * Time: 11:16
 */

namespace toDo\Services;


class Validator
{
    private $messages=[];
    public static $password_length=8;


    public function __construct(array $validators)
    {
//        var_dump($validators);
//        die();
        foreach ($validators as $validator => $value){
            $validator_method="check";
            $validator_method.=ucfirst($validator);
            $this->$validator_method($value);
        }
        //renvoit une instance de lui même
        return $this;
    }

    /**
     * @param $message
     */
    private function addMessage($message){
        $this->messages[]=$message;
    }

    /**
     * @return array
     */
    public function getMessages()
    {
        if (count($this->messages)>0){
            return $this->messages;
        }else{
            return false;
        }
    }

    private function checkEmail($email)
    {
        //vérifier le format de l'émail
        $is_valid=true;
        if (!filter_var($email,FILTER_VALIDATE_EMAIL)){
//    if (preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $email)){
            $is_valid=false;
            $this->addMessage("Email Invalide: Format email incorrecte");
        }
        if ($is_valid){
            //Vérifier le serveur MX du domaine
            $domaine_email=explode("@",$email);
            if (checkdnsrr($domaine_email[1],'MX')==false){
//                $is_valid=true;
                $this->addMessage("Email Invalide: Serveur MX indisponible");
            }
        }
    }

    /**
     * @param $password
     * @return bool
     */
    private function checkPassword($password){
        $is_valid=true;
        if (strlen($password)<static::$password_length){
            $is_valid=false;
            $this->addMessage("Mot de passe invalide: Saisir au moins ".static::$password_length." caractères");
        }
//        return $is_valid;
    }

    /**
     * @param $datas
     */
    private function checkEmpty($datas){
        if (in_array(null,$datas)){
            $this->addMessage("Tous les champs sont obligatoire");
        }
    }





}