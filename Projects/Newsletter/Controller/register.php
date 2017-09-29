<?php
//Ici logique métier pour prendre en charge l'inscription par utilisateur
//1 Connexion à la DB
require_once '../Kernel/DB.php';
//2 Récupérer les données du formulaire
require_once '../Kernel/functions.php';
require_once '../Model/User.php';
$datas=extract_datas_form($_POST);
//var_dump($_POST);
//var_dump($datas);
//3 Vérifier les données avec :
//                  aucun champs vide,
$messages=[];
if (in_array(null,$datas)){
    $messages[]="Tous les champs sont obligatoire";
}
//                  login unique,
$user=findOneUserBy("login",$_POST["login"]);
//var_dump($user->num_rows);
if($user->num_rows==1){
    $messages[]="le login {$datas['login']} est déjà pris";
}
//email unique,
$user=findOneUserBy("email",$_POST["email"]);
//var_dump($user->num_rows);
if($user->num_rows==1){
    $messages[]="l'email {$datas['email']} est déjà pris";
}
//  mdp valide (min 8 caractères)
if (checkPassword($datas['password'])==false){
    $messages[]="La taile du mot de passe doit être supérieur à 8 caractères.";
}
// format email valide
if (!checkEmailFormat($datas['email'])){
    $messages[]="Le format de l'email est incorrect";
}
//4 Si tout est ok, insertion des données dans la table user
//Si pas de message d'erreur
if (count($messages)==0){
    addUser($datas);
    setFlash('Merci à bientôt','success');
    header("Location: ../index.php?action=success");
}else{
    setFlash($messages,'danger');
    header("Location: ../index.php");
}
?>