<?php

require_once '/var/www/html/JumpWebService/Config/conf.php';
//require_once '/srv/http/JumpWebService/Config/conf.php';
require_once Conf::getRootDir().'Data/Entity.php';

class NationalIdentifierType extends Entity
{
    private static $id;
    private static $description;

    static protected $tableName ='NationalIdentifierType';
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
