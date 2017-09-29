<?php
namespace Mailer\Services;


class ToolBox
{
    //static sur des classes qui n'ont pas d'attribué à traiter,
    // on utilise juste les fonctions avec les paramètres.
    /**
     * @param $datas_brut
     * @return array
     */
    public static function extract_datas_form($datas_brut){
        $datas=[];
        foreach ($datas_brut as $key => $data_brut){
            //On insère dans le nouveau array $datazs la valeur "trimé" pour retirer les espaces en extrêmité du champ.
            if (empty($data_brut)==false){
                $datas[$key]=trim($data_brut);
            }
            //Si une donnée est vide
            else{
                $datas[$key]=null;
            }
        }
        return $datas;
    }

    /**
     * @param $password
     * @return bool
     */
    public static function checkPassword($password){
        $is_valid=true;
        if (strlen($password)<8){
            $is_valid=false;
        }
        return $is_valid;
    }

    /**
     * @param $email
     * @return bool
     */
    public static function checkEmailFormat($email){
        //vérifier le format de l'émail
        $is_valid=false;
        if (filter_var($email,FILTER_VALIDATE_EMAIL)){
//    if (preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $email)){
            $is_valid=true;
        }
        if ($is_valid){
            //Vérifier le serveur MX du domaine
            $domaine_email=explode("@",$email);
            if (checkdnsrr($domaine_email[1],'MX')!=false){
                $is_valid=true;
            }
        }
//        var_dump($is_valid);

        return $is_valid;
    }

    /**
     * @param $message
     * @param $type (danger,success,warning,info)
     * @return mixed
     */
    public static function setFlash($message,$type){
        if (isset($_SESSION)==false){
            session_start();
        }
        $_SESSION['flash']=array('type'=>$type,'message'=>$message);
    }

    /**
     * Affiche le flash
     */
    public static function getFlash(){
        if (isset($_SESSION['flash']))
        {
            $type=$_SESSION['flash']['type'];
            $message=$_SESSION['flash']['message'];
//    $html=" <div class='alert alert-".$type."' role='alert'>".$message."</div>";
//        ou
            $html="<div class='text-center alert alert-$type'>";
            if (is_array($message)){
                foreach ($message as $m){
                    $html.=$m.'<br/>';
                }
            }
            else{
                $html.=$message;
            }
            $html.="</div>";
            //Affichage du message
            echo $html;
            //Destruction du message
            unset($_SESSION['flash']);
        }
    }

}