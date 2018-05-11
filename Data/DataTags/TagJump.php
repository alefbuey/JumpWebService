<?php

//require_once '/var/www/html/JumpWebService/Config/conf.php';
require_once '/srv/http/JumpWebService/Config/conf.php';
require_once Conf::getRootDir().'Data/Entity.php';

class TagJump extends Entity
{
    private static $id;
    private static $name;
    private static $description;
    private static $category;


    static protected $tableName ='TagJump';
    static protected $primaryKey='id';

    //getter
    public function get($attribut) {
            if (property_exists($this, $attribut)) {
                    return $this->$attribut;
            }
    }

    //setter
    public function set($attribut,$valeur) {
                    if (property_exists($this, $attribut)) {
                            $this->$attribut=$valeur;
             }
    }

}


?>
