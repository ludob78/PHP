<?php
/**
 * Created by PhpStorm.
 * User: stagiaire
 * Date: 12/06/2017
 * Time: 09:19
 */

namespace toDo\Kernel;


class EntityManager
{
    /**
     * @param $datas $_POST, $_GET, $_SESSION...
     * @param $entity //chemin du namespace
     * @return $entity_hydrate, l'entité hydratée
     */
    public static function hydrate($datas,$entity){
       //1 Instancier l'entité
        $entity_hydrate=new $entity();
        //2 créer un tableau avec les données "nettoyées"
        $datas_cleans=[];
//        $entity_hydrate="";
        foreach ($datas as $key=>$value){
            if (is_array($value)){
                foreach ($value as $k=>$v){
                    $datas_cleans[$k]=htmlentities(trim($v));
                }

            }elseif (!empty($value)){
                $datas_cleans[$key]=htmlentities(trim($value));
            }else{
                $datas_cleans[$key]=null;
            }
        }
        if (count($datas_cleans)>0){
            foreach ($datas_cleans as $key_dc => $value_dc){
                $setter="set";
                $setter.=ucfirst($key_dc);
                $entity_hydrate->$setter($value_dc);
            }
        }else{
            throw new \Exception("Impossible d'hydrater l'entité");
        }
        return $entity_hydrate;
    }
}