<?php
namespace toDo\Controller;

use toDo\Entity\User;
use toDo\Kernel\EntityManager;
use toDo\Repository\UserRepository;
use toDo\Services\FormFactory;
use toDo\Services\ToolBox;
use toDo\Services\Validator;

class ControllerUser{

    private $root_path_views="";
    private $user_repository;
    public function __construct()
    {
        $this->root_path_views=dirname(dirname(__FILE__)).'/Views/User/';
        $this->user_repository=new UserRepository();
        session_start();
    }
    public function login()
    {
        //utiliser le service Factory
        $form=new FormFactory();
        require $this->root_path_views.'Login.php';
    }

    public function doLogin ()
    {
        //Ici on récupère les données du formulaire
        //Celà nous permet d'instancier un objet de type Entity\User
        $user=EntityManager::hydrate($_POST,'\toDo\Entity\User');
        $validators=['empty' => $_POST];
        $validator=new Validator($validators);
//        var_dump($validator->getMessages());
//        die();
        if ($validator->getMessages()){
            ToolBox::setFlash($validator->getMessages(),'danger');
            header("Location: index.php?action=User/login");

        }else{
            //Instanciation du UserRepository
            $res=$this->user_repository->reqLogin($user);
            if (count($res)==1){
//                session_start();
                $_SESSION['is_logged']=true;
                $_SESSION['id_user']=$res[0]->getIdUser();
//                var_dump($res);
//                var_dump($res[0]->getIdUser());
//                die();
                header("Location: index.php?action=Task/showAll");
            }
            else{
                ToolBox::setFlash('Impossible de vous identifier','danger');
                header("Location: index.php?action=User/login");
            }
        }

    }

    public function register(){
        $form=new FormFactory();
        require $this->root_path_views.'Register.php';

    }

    public function doRegister(){

        $user=EntityManager::hydrate($_POST,'toDo\Entity\User');
        //Préparer associatif avec les données à contrôler.
        $validators=array('email'=>$user->getEmail(),'password'=>$_POST["password"],'empty'=>$_POST);
        //On instancie la class validators
        $validator=new Validator($validators);
//        var_dump($validator);
//        die();
        if ($validator->getMessages()){
            ToolBox::setFlash($validator->getMessages(),'danger');
            header("Location: index.php?action=User/register");
        }else{
            //Chercher un user existe déjà avec cet email dans la BDD
            $count_email_user=$this->user_repository->findUsersBy('email',$user->getEmail());
            $count_login_user=$this->user_repository->findUsersBy('login',$user->getLogin());
            $crea_compte=true;
            $messages=[];
            if (count($count_email_user)==1){
                $messages[]="Cet email a déjà été enregistré";
                $crea_compte=false;
            }
            if (count($count_login_user)==1){
                $messages[]="Ce login a déjà été enregistré";
                $crea_compte=false;
            }
            if ($crea_compte){
                $res=$this->user_repository->reqRegister($user);
                //récupération de l'ID du user qui vient d'être insérer dans la table.
//                var_dump($LastInsertId);
//                die();
                if ($res){
                    $_SESSION['is_logged']=true;
                    $LastInsertId= $this->user_repository->getLastInsertId();
                    $_SESSION['id_user']=$LastInsertId;
                header("Location: index.php?action=Task/showAll");
                }else{
                    ToolBox::setFlash("Impossible de vous créer un compte","danger");
                    header("Location: index.php?action=User/register");
                }
            }else{
                ToolBox::setFlash($messages,'danger');
                header("Location: index.php?action=User/register");
            }
        }

    }

    public function Logout(){
        session_start();
        session_destroy();
        header("Location: index.php?action=User/login");
    }
}