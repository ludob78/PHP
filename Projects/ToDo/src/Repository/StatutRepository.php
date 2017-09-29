<?php
/**
 * Created by PhpStorm.
 * User: stagiaire
 * Date: 13/06/2017
 * Time: 09:24
 */

namespace toDo\Repository;
use toDo\Kernel\DB;

class StatutRepository
{
    private $table_name="statut";
    private $pdo;
    private $statut;

    public function __construct()
    {
        $db=new DB();
        $this->pdo=$db->getConnexion();
    }

    public function findAllStatut(){
        $sql="SELECT * FROM {$this->table_name}";
        $res=$this->pdo->query($sql);
        $res=$res->fetchAll(\PDO::FETCH_CLASS,'toDo\Entity\Statut');
        return $res;
    }

    public function findStatut($id_statut){
        $sql="SELECT * FROM {$this->table_name} WHERE id_statut=:id_statut";
        $stmt=$this->pdo->prepare($sql);
        $stmt->bindValue(':id_statut',$id_statut,\PDO::PARAM_INT);
        $stmt->execute();
        $stmt->setFetchMode(\PDO::FETCH_CLASS,'toDo\Entity\Statut');
        $res=$stmt->fetchAll();
        return $res;
    }
}