<?php
//Toolbox de fonction réutilisables dans X projet
/**
 * Extraire les données d'un formulaire
 * @param array $_POST ou $_GET > $datasbrut
 * @return array $datas
 */
function extract_datas_form($datas_brut){
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
 * @param $message
 * @param $type (danger,success,warning,info)
 * @return mixed
 */
function setFlash($message,$type){
        if (isset($_SESSION)==false){
            session_start();
        }
    $_SESSION['flash']=array('type'=>$type,'message'=>$message);
}
function getFlash(){
 /*   if (isset($_SESSION)==false){
        session_start();
    }*/
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
function checkPassword($password){
    $is_valid=true;
    if (strlen($password)<8){
        $is_valid=false;
    }
    return $is_valid;
}
function checkEmailFormat($email){
    //vérifier le format de l'émail
    $is_valid=false;
    if (filter_var($email,FILTER_VALIDATE_EMAIL!=false)){
//    if (preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $email)){
        $is_valid=true;
    }
    //Vérifier le serveur MX du domaine
    $domaine_email=explode("@",$email);
    if (checkdnsrr($domaine_email[1],'MX')!=false){
        $is_valid=true;
    }
    return $is_valid;
}
?>