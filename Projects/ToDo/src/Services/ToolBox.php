<?php
namespace toDo\Services;


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
     * @param $email
     * @return bool
     */


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
//        session_start();
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