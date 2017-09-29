<?php
/**
 * Created by PhpStorm.
 * User: stagiaire
 * Date: 07/06/2017
 * Time: 14:21
 */
namespace Mailer\Controller;
use Mailer\Services\FormFactory;
use Mailer\Services\ToolBox;

class ControllerMailer
{
    private $root_path_views="";
    public function __construct()
    {
        $this->root_path_views=dirname(dirname(__FILE__)).'/Views/';
    }

    public function showForm(){
//        echo "Salut c'est la méthode showForm() du sous controller 'ControllerMailer'";
        //La portée de la variable $form est locale à la fonction showForm().
        //Cette fonction lance un require de la vue. Donc la variable est également accessible dans la vue.
        $form= new FormFactory($_POST);
//        print_r($form);
//        die();
        $success=false;
        if ($_SERVER['REQUEST_METHOD']=='POST')
        {
             //récupérer les données du formulaire
            $datas=ToolBox::extract_datas_form($_POST);
//            var_dump($datas);
            //gestion des erreurs
            //Initialisation tableau vide
            $messages=[];
                        if (in_array(null,$datas)){
                $messages[]= "Certains champs sont obligatoire";
            }
            //L'email de l'expéditeur doit être correcte
            $is_valid_email_expediteur=ToolBox::checkEmailFormat($datas['email_expediteur']);
            if ($is_valid_email_expediteur==false){
                $messages[]= "L'adresse email de l'expéditeur est invalide";
            }
            //L'email du destinataire doit être correcte
            $is_valid_email_destinaraire=ToolBox::checkEmailFormat($datas['email_destinataire']);
            if ($is_valid_email_destinaraire==false){
                $messages[]= "L'adresse email du destinataire est invalide";
            }
            //Si au moins un message d'erreur > on le/les stocke dans la session via setFlash();
            ToolBox::setFlash($messages,'danger');
            if (count($messages)==0){
                //Sinon on envoie le mail et on stock un message de confirmation.
//                die();
                $transport = (new \Swift_SmtpTransport('smtp.sendgrid.net', 587))
                    ->setUsername('bibi2000')
                    ->setPassword('bibi123456789')
                ;
                // Create the Mailer using your created Transport
                $mailer = new \Swift_Mailer($transport);

                // Create a message
                $message = (new \Swift_Message($datas['sujet']))
                    ->setFrom([$datas['email_expediteur'] => $datas['nom_expediteur']])
                    ->setTo([$datas['email_destinataire'] => $datas['nom_destinataire']])
                    ->setBody($datas['message'])
                ;
                // Send the message
                $result = $mailer->send($message);
                if ($result){
                    ToolBox::setFlash('Votre email a été envoyé','success');
                    $success=true;
                }else{
                    ToolBox::setFlash("Votre email n'a pas pu être envoyé suite à un problème",'danger');
                }
            }
        }
//        require '../Views/Mailer/showForm.php';
        require $this->root_path_views.'Mailer/showForm.php';
    }
}