<?php

require_once '/var/www/html/JumpWebService/Config/conf.php';
//require_once '/srv/http/JumpWebService/Config/conf.php';
require_once Conf::getRootDir().'Data/Entity.php';

class UserStaff extends Entity
{   

    private static $idUser;
    private static $about;
    private static $photoPath;
    private static $cellphone;
    private static $image;


    static protected $tableName ='UserStaff';
    static protected $primaryKey='idUser';
    
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
