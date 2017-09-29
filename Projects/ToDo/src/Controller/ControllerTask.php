<?php
/**
 * Created by PhpStorm.
 * User: stagiaire
 * Date: 12/06/2017
 * Time: 16:27
 */

namespace toDo\Controller;

use toDo\Entity\Task;
use toDo\Kernel\Controller;
use toDo\Kernel\EntityManager;
use toDo\Repository\StatutRepository;
use toDo\Repository\TaskRepository;
use toDo\Services\FormFactory;
use toDo\Services\ToolBox;
use toDo\Services\Validator;

class ControllerTask extends Controller
{
    private $root_path_views="";
    private $task_repository;
    private $statut_repository;
    public function __construct()
    {
        $this->root_path_views=dirname(dirname(__FILE__)).'/Views/Task/';
        $this->task_repository=new TaskRepository();
        $this->statut_repository=new StatutRepository();
        session_start();
        if (isset($_SESSION['is_logged'])==false||$_SESSION['is_logged']==false){
            //La méthode forbidden403 est hérité de Controller
            $this->forbidden403();
        }
        else{
//            print_r($_SESSION);
        }
    }
    public function showAll(){

        $id_user=$_SESSION['id_user'];
        $id_statut=isset($_GET['modificationId'])?$_GET['modificationId']:false;
        $tasks=$this->task_repository->findAllTask($id_user,$id_statut);
        $statuts=$this->statut_repository->findAllStatut();




        require_once $this->root_path_views.'showAll.php';
    }

      public function manageTask(){
        $statuts=$this->statut_repository->findAllStatut();
        //Seulement dans le cas d'une modification, on a dans l'URL une clé id_task
        $id_task=isset($_GET['modificationId'])?$_GET['modificationId']:false;
        //récupération du user connecté. Cela nous permet de vérifier que le user a bien le droit de consulter/modifier cette task.
        $id_user=$_SESSION['id_user'];

          $action="Ajouter";
          if ($id_task){
            //Si modification, on récupère dans la DB l'instance task à modifier
            $task=$this->task_repository->findTaskBy('id_task',$id_task,$id_user,true);
            var_dump($task);

            $form=new FormFactory($task);
            $action="Modifier";
        }else{
            //Sinon on est en mode création de task
            $form=new FormFactory($_POST);
        }

        //Si méthode POST via protocole HTTP > c'est que le formulaire est validé
        if ($_SERVER['REQUEST_METHOD']=='POST')
        {

            //1 Gestion des erreurs via le service validator > tous les champs sont obligatoires
                         $validators=array('empty'=>$_POST);
                        $validator=new Validator($validators);

           if ($validator->getMessages()){
                ToolBox::setFlash("Tous les champs sont obligatoire",'danger');
           }
            else{
                //2 hydratation de l'objet task
                $task=EntityManager::hydrate($_POST,'\toDo\Entity\Task');
                //Ajouter des données manquantes qui ne viennent pas du formulaire
                $task->setFkIdUser($_SESSION['id_user']);
                $task->setIdTask($id_task);

//               die();
                //L'utilisateur doit pouvoir mettre à jour le titre de la tâche sans l'alerte
                //L'utilisateur doit pouvoir mettre à jour le titre mais pas en remettant un sujet existant.

                //Vérifier que le sujet n'existe pas déjà
                $count_titre=$this->task_repository->findTaskBy('titre',$task->getTitre(),$task->getFkIdUser());

                if (count($count_titre)>0 && ($count_titre[0]->getIdTask()!=$id_task)){
                    ToolBox::setFlash("Ce titre existe déjà",'danger');
                }
                else
                {
//                    var_dump($id_task);
//                    die();
                    //3 Si tout ok, insertion des données dans la table via la méthode createTask du TaskRepository()
                    if ($id_task==false){
                        //4 Redirection vers la vue Task/showAll
                        ToolBox::setFlash("La nouvelle tâche a été créé",'success');
                        $this->task_repository->createTask($task);
//                            exit;
                    }else{
                        ToolBox::setFlash('La tâche a été modifiée','success');
                        $this->task_repository->updateTask($task);
                    }
                    header("Location: index.php?action=Task/showAll");
                    exit;
                }
            }
        }

        require_once $this->root_path_views.'manage.php';
    }

    /*public function manageTask(){
        $statuts=$this->statut_repository->findAllStatut();
        //Seulement dans le cas d'une modification, on a dans l'URL une clé id_task
        $id_task=isset($_GET['modificationId'])?$_GET['modificationId']:false;

        //récupération du user connecté. Cela nous permet de vérifier que le user a bien le droit de consulter/modifier cette task.
        $id_user=$_SESSION['id_user'];
        if ($id_task){
            //Si modification, on récupère dans la DB l'instance task à modifier
            $task=$this->task_repository->findTaskBy('id_task',$id_task,$id_user,true);
            var_dump($task);

            $form=new FormFactory($task);
        }else{
            //Sinon on est en mode création de task
            $form=new FormFactory($_POST);
        }

        //Si méthode POST via protocole HTTP > c'est que le formulaire est validé
        if ($_SERVER['REQUEST_METHOD']=='POST')
        {
            //1 Gestion des erreurs via le service validator > tous les champs sont obligatoires
            $validators=array('empty'=>$_POST);
            $validator=new Validator($validators);

            if ($validator->getMessages()){
                $messages=ToolBox::setFlash($validator->getMessages(),'danger');
            }
            else{
                //2 hydratation de l'objet task
                $task=EntityManager::hydrate($_POST,'\toDo\Entity\Task');
                $task->setFkIdUser($_SESSION['id_user']);
//                $_SESSION['instance_tache']=$task;
//                die;
                //Vérifier que le sujet n'existe pas déjà
                $count_titre=$this->task_repository->findTaskBy('titre',$task->getTitre(),$task->getFkIdUser());

                if (count($count_titre)>0){
                    ToolBox::setFlash("Ce titre existe déjà",'danger');
                }
                else
                {
                    //3 Si tout ok, insertion des données dans la table via la méthode createTask du TaskRepository()
                    $createTask=$this->task_repository->createTask($task);
                    if($createTask){
                        //4 Redirection vers la vue Task/showAll
                        ToolBox::setFlash("La nouvelle tâche a été créé",'success');
                        header("Location: index.php?action=Task/showAll");
                        exit;
                    }
                    else{
                        ToolBox::setFlash('Tâche non enregistrée','danger');
                    }
                }
            }
        }

        require_once $this->root_path_views.'manage.php';
    }*/

    public function deleteTask(){
        $validators=array('empty'=>$_GET);
        $validator=new Validator($validators);
        if ($validator->getMessages()){
            ToolBox::setFlash("Pas d'id de tâche à supprimer",'danger');

        }
        else{

            $task_id=$_GET['suppressionId'];
            $deleteTask=$this->task_repository->deleteTask($_SESSION['id_user'],$task_id);
            if ($deleteTask){
                ToolBox::setFlash('Tâche supprimée','success');
                    header("Location: index.php?action=Task/showAll");
                    exit;

            }
            else{
                ToolBox::setFlash('Tâche non supprimée','danger');
                    header("Location: index.php?action=Task/showAll");
                    exit;
            }
        }
    }

}