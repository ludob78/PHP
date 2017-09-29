<?php
error_reporting(E_ERROR || E_PARSE);
// Logique métier pour se connecter à un DB
//print_r($_SERVER);
$connexion=true;
if ($_SERVER["SERVER_ADDR"]== "127.0.0.1"){
    //définir des constantes pour les paramétrages de BDD.
    define('DB_NAME','newsletter_db');
    define('DB_USER','root');
    define('DB_PASSWORD','root');
    define('DB_HOST','localhost');

}
//SI le serveur de prod (remplacer les informations fournis par le fournisseur d'hébergement de la DB)
else if($_SERVER["SERVER_ADDR"]== "270.14.70.33"){
    define('DB_NAME','newsletter_db');
    define('DB_USER','root123');
    define('DB_PASSWORD','roo5556');
    define('DB_HOST','localhost');
}
else{
    $connexion=false;
    die("Impossible de se connecter à la DB.");
}
if ($connexion){
    $db=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME)
    or die("Erreur de connexion ".mysqli_error($db))
    ;
//DEBUG
//    echo "connexion ok";
}
?>