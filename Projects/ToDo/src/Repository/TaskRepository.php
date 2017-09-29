<?php
/**
 * Created by PhpStorm.
 * User: stagiaire
 * Date: 12/06/2017
 * Time: 16:28
 */

namespace toDo\Repository;


use toDo\Kernel\DB;
use toDo\Entity\User;
use toDo\Entity\Task;

class TaskRepository
{
    private $table_name="task";
    private $pdo;

    public function __construct()
    {
        $db=new DB();
        $this->pdo=$db->getConnexion();
    }

    public function findAllTaskByUser($id_user){
        $sql="SELECT * FROM {$this->table_name} INNER JOIN statut as S ON S.id_statut=task.fk_id_statut AND FK_ID_USER=:id_user";
        $stmt=$this->pdo->prepare($sql);
        $stmt->bindValue(":id_user",$id_user,\PDO::PARAM_STR);
        $stmt->execute();
        $stmt->setFetchMode(\PDO::FETCH_CLASS,'toDo\Entity\Task');
        $res=$stmt->fetchAll();
        return $res;
    }


    public function findAllTask($idUser,$id_statut=false){
        $sql="SELECT * FROM {$this->table_name} LEFT JOIN statut as S ON S.id_statut={$this->table_name}.fk_id_statut WHERE fk_id_user=:id_user";
            if (is_numeric($id_statut)){
                $sql.=" AND {$this->table_name}.fk_id_statut=:id_statut;";
            }
        $stmt=$this->pdo->prepare($sql);
        $stmt->bindValue(":id_user",$idUser,\PDO::PARAM_INT);
        if (is_numeric($id_statut)){
        $stmt->bindValue(":id_statut",$id_statut,\PDO::PARAM_INT);
        }
        $stmt->execute();
        $stmt->setFetchMode(\PDO::FETCH_CLASS,'toDo\Entity\Task');
        $res=$stmt->fetchAll();
        return $res;
    }

    /*public function findAllTask(){
        $sql="SELECT * FROM {$this->table_name} LEFT JOIN statut as S ON S.id_statut={$this->table_name}.fk_id_statut";
        $res=$this->pdo->query($sql);
        $res=$res->fetchAll(\PDO::FETCH_CLASS,'toDo\Entity\Task');
        return $res;
    }*/


    public function createTask(Task $task){
        $sql="Insert into {$this->table_name} (titre, resume, content, created_at,fk_id_user, fk_id_statut) VALUES (:title,:resume,:contenu,:created_at,:id_user,:id_statut)";
//        var_dump($task);
//        die();

        $stmt=$this->pdo->prepare($sql);
        $stmt->bindValue(":title",$task->getTitre(),\PDO::PARAM_STR);
        $stmt->bindValue(":resume",$task->getResume(),\PDO::PARAM_STR);
        $stmt->bindValue(":contenu",$task->getContent(),\PDO::PARAM_STR);
        $stmt->bindValue(":created_at",$task->getCreatedAt(true),\PDO::PARAM_STR);
        $stmt->bindValue(":id_statut",$task->getFkIdStatut(),\PDO::PARAM_INT);
        $stmt->bindValue(":id_user",$task->getFkIdUser(),\PDO::PARAM_INT);
        $res=$stmt->execute();

        return $res;
    }

    public function deleteTask($iduser,$task_id){
        $sql="DELETE FROM {$this->table_name} WHERE fk_id_user=:id_user AND id_task=:id_task";
        $stmt=$this->pdo->prepare($sql);
        $stmt->bindValue(":id_user",$iduser,\PDO::PARAM_INT);
        $stmt->bindValue(":id_task",$task_id,\PDO::PARAM_INT);
        $res=$stmt->execute();
        return $res;
    }

    public function updateTask(Task $task){
        $sql="UPDATE {$this->table_name} SET titre=:titre,resume=:resume,content=:content,fk_id_statut=:fk_id_statut WHERE fk_id_user=:id_user AND id_task=:id_task";
        $stmt=$this->pdo->prepare($sql);
        $stmt->bindValue(":id_user",$task->getFkIdUser(),\PDO::PARAM_INT);
        $stmt->bindValue(":id_task",$task->getIdTask(),\PDO::PARAM_INT);
        $stmt->bindValue(":titre",$task->getTitre(),\PDO::PARAM_STR);
        $stmt->bindValue(":resume",$task->getResume(),\PDO::PARAM_STR);
        $stmt->bindValue(":content",$task->getContent(),\PDO::PARAM_STR);
        $stmt->bindValue(":fk_id_statut",$task->getFkIdStatut(),\PDO::PARAM_INT);
        $res=$stmt->execute();
        return $res;
    }

    public function findTaskBy($critere,$value,$idUser,$one=false){
//        $sql="SELECT * FROM {$this->table_name} INNER JOIN statut as S ON S.id_statut=task.fk_id_statut AND $critere=:critere AND fk_id_user=:id_user";
        $sql="SELECT * FROM {$this->table_name} WHERE $critere=:critere AND fk_id_user=:id_user";
        $stmt=$this->pdo->prepare($sql);
        $stmt->bindValue(':critere',$value,\PDO::PARAM_STR);
        $stmt->bindValue(':id_user',$idUser,\PDO::PARAM_INT);
        $stmt->execute();
        $stmt->setFetchMode(\PDO::FETCH_CLASS,'\toDo\Entity\Task');
        if ($one){
            $res=$stmt->fetch();
        }else{
            $res=$stmt->fetchAll();
        }
        return $res;
    }



}