<?php
namespace Mailer\Services;

class FormFactory
{
    private $type;
    private $name;
    private $datas;
    public static $bootstrap=false;//Cette variable de classe permet de définir le status bootstrap pour l'ensemble des objets créé
//    tandis que la variable d'instance(constructeur) définit le statut bootstrap sur une instance d'objet.

//Constructeur pour conserver dans une tableau les retours du $POST de la vue. Initialisation du tableau à vide.
    public function __construct($datas=[])
    {
        $this->datas=$datas;
//        print_r($this->datas);
    }
//Getter pour récupérer le tableau stocké dans $datas
    private function getValue($name){
        return isset($this->datas[$name])?$this->datas[$name]:null;
    }

    private function Bootstrap($html)
    {
        if (static::$bootstrap){
            return "<div class='form-group'>$html</div>";
        }
        else{
            return $html;
        }
    }

    private function IsRequired($isRequered){
        $is_Requerid=$isRequered?"<span style='color: red;'> *</span>":null;
        return $is_Requerid;
    }

//    public function Input($name,$label=null,$options=['type'=>'text','css'=> null],$value=null)
    public function Input($name,$label=null,$options=['type'=>'text','css'=> null,'require'=>false])
    {
        $label="<label for='$name'>$label</label>";
        $input="<input class='{$options['css']}' type='{$options['type']}' name='$name' id='$name' value='{$this->getValue($name)}'>";
        if ($options['type']=="textarea"){
            $input="<br><textarea name='$name' rows='10' cols='50'>{$this->getValue($name)}</textarea>";
        }
        return $this->Bootstrap($label.$this->IsRequired($options['require']).$input);
    }

    //alternative pour une meilleur visibilité dans la vue du submit (géré également dans le input précédent)
    public function Submit($options=['value'=>'valider','css'=>null]){
        $html= "<input class='{$options['css']}' type='submit' value='{$options['value']}'>";
            return $this->Bootstrap($html);
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

}
?>