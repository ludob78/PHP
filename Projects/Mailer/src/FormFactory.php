<?php
//namespace FORMFAC;
class FormFactory
{
    private $type;
    private $name;
    private $value;

    public function Input($type,$name,$value='')
    {
        $this->type=$type;
        $this->name=$name;
        $this->value=$value;
        if ($this->type=="submit"){
            $html="<input type='$this->type' name='$this->name' id='$this->name' value='$this->value'>";
        }
        else{
            $html="<input type='$this->type' name='$this->name' id='$this->name'>";
        }
        echo $html;
    }
    public function TextArea($name){
        $this->name=$name;
        $html="<textarea name='$this->name' rows='10' cols='50'></textarea>";
        echo $html;
    }
    public function Label($name,$value){
        $this->name=$name;
        $this->value=$value;
        $html="<label for='$this->name'>$this->value</label>";
        echo $html;
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