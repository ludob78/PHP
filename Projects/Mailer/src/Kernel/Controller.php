<?php
namespace Mailer\Kernel;

class Controller
{
    public function __construct()
    {
        //Récupération du paramétre action dans l'uri
        $action=isset($_GET['action'])?$_GET['action']:false;
        //On doit déduire de l'action le nom du sous controller à instancier
        //et le nom de la méthode à appeler pour afficher la vue demandée
        $action=explode("/",$action);
//        print_r($action);
//        die();
        if (count($action)!=2){
            $this->notFound404();
        }
        else
            {
            $controller_name=$action[0];
            $controller_action=$action[1];
            $controller_str= "\\Mailer\\Controller\\Controller$controller_name";
            if (class_exists($controller_str)==false){
                header("HTTP/1.0 404 Not Found");
                die("Classe Introuvable");
            }
            $controller=new $controller_str;
            if (method_exists($controller,$controller_action)==false){
                header("HTTP/1.0 404 Not Found");
                die("Method Introuvable");
            }
            $controller->$controller_action();
        }
    }

    private function notFound404()
    {
        header("HTTP/1.0 404 Not Found");
        die("Fichier Introuvable");
    }

}