<?php
//Ici les fonctions qui nous permettrons de travailler avec la DB et la table user.
function findOneUserBy($key_search,$value){
    global $db;
//    $sql="SELECT * from user where email='toto@gmail.com'";
    $value=clean_datas($value);
    $sql="SELECT * from user where $key_search = $value";
    $res=mysqli_query($db,$sql) or die(mysqli_error($db));
    return $res;

}
function addUser($datas){
    global $db;
//    $sql="SELECT * from user where email='toto@gmail.com'";
    $keys=array_keys($datas);
    $keys=implode(",",$keys);
    $values=clean_datas($datas);
//    print_r($keys);
//    print_r($values);
//    die();
//    $keys=implode(",",$keys);
    $values=implode(",",$values);
    //    $value=clean_datas($value);
    $sql="INSERT INTO user ( $keys,created_at ) VALUES ($values,NOW());";
//    echo $sql;
//    die();
        $res=mysqli_query($db,$sql) or die(mysqli_error($db));
    return $res;
}
function clean_datas($datas){
    //on récupère la variable $db du fichier DB.php
    //Cette variable n'est pas dispo dans une fonction mais seulement en dehors.
    // Le mot clé global permet d'y faire référence.
    $data_clean="";
    global $db;
    if (is_array($datas))
    {
        foreach ($datas as $key => $data)
        {
            if ($key=="password"){
                $data=sha1($data);
            }
            $data_clean[$key]="'".mysqli_real_escape_string($db,$data)."'";
        }
    }
    else{
        $data_clean="'".mysqli_real_escape_string($db,$datas)."'";
        //l'école vient l'\'école
    }
    return $data_clean;
}
?>