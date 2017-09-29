<?php
/**
 * Created by PhpStorm.
 * User: stagiaire
 * Date: 09/06/2017
 * Time: 11:09
 */

namespace toDo\Repository;
use toDo\Entity\User;
use toDo\Kernel\DB;

class UserRepository
{
    private $table_name="user";
    private $pdo;

    public function __construct()
    {
        $db=new DB();
        $this->pdo=$db->getConnexion();
    }

    public function getLastInsertId(){
        return $this->pdo->lastInsertId();
    }

    /**Identifier un utilisateur
     * @param User $user
     * @return array User $user
     */
    public function reqLogin(User $user){

        //Requête préparée
        $sql="SELECT * FROM {$this->table_name} WHERE login=:logun AND password=:pasword";
        $stmt=$this->pdo->prepare($sql);
        $login=$user->getLogin();
        $password=$user->getPassword();
        $stmt->bindParam(":logun",$login,\PDO::PARAM_STR);
        $stmt->bindParam(":pasword",$password,\PDO::PARAM_STR);
        //Execution de la requête préparée
        $stmt->execute();
        //Récupération du résultat de la requête
        $stmt->setFetchMode(\PDO::FETCH_CLASS,'TODO\Entity\User');
        //fetchall renvoit un tableau
        $res=$stmt->fetchAll();
        return $res;
    }

    /**
     * @param User $user
     * @return bool
     */
    public function reqRegister(User $user){
        $sql="INSERT INTO {$this->table_name} (login,email,password,is_admin,prenom,nom,created_at) VALUES(:login,:email,:password,:is_admin,:prenom,:nom,:created_at)";
        $stmt=$this->pdo->prepare($sql);
        $stmt->bindValue(":login",$user->getLogin(),\PDO::PARAM_STR);
        $stmt->bindValue(":email",$user->getEmail(),\PDO::PARAM_STR);
        $stmt->bindValue(":password",$user->getPassword(),\PDO::PARAM_STR);
        $stmt->bindValue(":is_admin",$user->getisAdmin(),\PDO::PARAM_BOOL);
        $stmt->bindValue(":prenom",$user->getPrenom(),\PDO::PARAM_STR);
        $stmt->bindValue(":nom",$user->getNom(),\PDO::PARAM_STR);
        $stmt->bindValue(":created_at",$user->getCreatedAt(true),\PDO::PARAM_STR);
        $res=$stmt->execute();
        return $res;
    }

    public function findUsersBy($critere,$value){
        $sql="SELECT * FROM {$this->table_name} WHERE $critere=:critere";
        $stmt=$this->pdo->prepare($sql);
        $stmt->bindValue(':critere',$value,\PDO::PARAM_STR);
        $stmt->execute();
        $stmt->setFetchMode(\PDO::FETCH_CLASS,'\toDo\Entity\User');
        $res=$stmt->fetchAll();
        return $res;
    }
}