<?php
require_once '/var/www/html/JumpWebService/Config/conf.php';
//require_once '/srv/http/JumpWebService/Config/conf.php';
require_once Conf::getRootDir().'Data/Entity.php';
class EmployeeJob extends Entity{
   
       
    static protected $tableName = 'EmployeeJob';
    static protected $primaryKey = array(1=>'idEmployee', 2 => "idJob");
    
    
    

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
