<?php

class User
{
    //liste des attributs de la classe
    private $email;
    private $password;
    private $length_password;
    private $created_at;
    private $age;
    private $country;

    //Variable static définie dans la class et non modifiable de l'extérieur (variable de class)
    private static $age_legal=18;
    const TVA_FR=20;
    const TVA_DE=21;
    const TVA_UK=19;

    //Liste des méthodes de la classe
    public static $longueur_password_commune;

    public function __construct()
//    public function __construct(int $length_password)
    {
//        $this->length_password=$length_password;
        $this->created_at = new DateTime();
//        echo "Je suis l'utilisateur ".$id;
    }
    public function setPassword($password)
   {
        if (strlen($password)<$this->length_password){
//          echo "message d'erreur";
            throw new Exception("Le mot de passe est trop court, $this->length_password caractères minimum");
        }
        else{
            $this->password=sha1($password);
        }
   }
   public function getPassword(){
        return $this->password;
   }
    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }
    /**
     * @param mixed $email
     */
    //method d'instance
    public function setEmail($email)
    {
        if ($this->checkEmailFormat($email))
        {
        $this->email = $email;
        }
        else{
        throw new Exception("Email: $email Invalide");
        }
    }
    //Fonction uniquement accessible dans la class User
    private function checkEmailFormat($email){
        //vérifier le format de l'émail
        $is_valid=false;
        if (filter_var($email,FILTER_VALIDATE_EMAIL!=false)){
    //if (preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $email)){
            $is_valid=true;
        }
        //Vérifier le serveur MX du domaine
        $domaine_email=explode("@",$email);
        if (checkdnsrr($domaine_email[1],'MX')!=false){
            $is_valid=true;
        }
        return $is_valid;
    }
//    Attribut static de class
    public function setAge($age){
        if ($age >= self::$age_legal){
        //if ($age >= static::$age_legal){
            $this->age=$age;
        }
        else{
            throw new Exception("Tu es trop jeune");
        }
    }
    /**
     * @return mixed
     */
    public function getCountry()
    {
        return $this->country;
    }
    /**
     * Définir un pays
     * @param mixed $country code_country FR,DE,ES,IT,UK
     */
    public function setCountry($country)
    {
        $this->country = $country;
    }
    public function displayPriceTTC($price_ht){
        $price_ttc=0;
            if ($this->country=="FR"){
                $price_ttc=round($price_ht* (1+(self::TVA_FR/100)));
            }
            else if ($this->country=="DE"){
                $price_ttc=round($price_ht* (1+(self::TVA_DE/100)));
            }
            else if ($this->country=="UK"){
                $price_ttc=round($price_ht* (1+(self::TVA_UK/100)));
            }
            else
            {
                throw new Exception("Impossible de calculer la TVA");
            }
        return $price_ttc;
    }
}


?>