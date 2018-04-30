<?php

//require_once '/var/www/html/JumpWebService/Config/conf.php';
require_once '/srv/http/JumpWebService/Config/conf.php';

class Entity{
	public static $pdo;

	public static function Init(){
		$hostname=Conf::getHostname();
		$database_name=Conf::getDatabase();
		$login=Conf::getLogin();
		$password=Conf::getPassword();
		try {
			self::$pdo = new PDO("pgsql:dbname=$database_name;host=$hostname", $login, $password);
			self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch (PDOException $e) {
			//if (Conf::getDebug()) {
			//echo $e->getMessage(); // affiche un message d'erreur
			//} else {
			//echo 'Cnnection error';
		//	}
			die();
		}
	}
	/*
	public static function selectAll(){
		$table_name=static::$tableName;
		$class_name=ucfirst($table_name);
		try {
			$rep=Entity::$pdo->query("SELECT * FROM $table_name");
		} catch (PDOException $e) {
			if (Conf::getDebug()) {
			echo $e->getMessage(); 
			} else {
			echo 'Connection error';
			}
			die();
			}
		$rep->setFetchMode(PDO::FETCH_CLASS, $class_name);
		return $rep->fetchAll();
	}
*/
        
        
        
    public static function select($primary_value){
        $table_name=static::$tableName;
        $class_name=ucfirst($table_name);
        $primary_key=static::$primaryKey;
  
        $sql = "SELECT * from $table_name WHERE $primary_key=:primary_v";
        
        $req_prep=Entity::$pdo->prepare($sql);
        
        $values = array(
                "primary_v" => $primary_value
        );
        try{
            $req_prep->execute($values);
           
               
        } catch (PDOException $e) {
                if (Conf::getDebug()) {
                echo $e->getMessage(); // show an error message
                } else {
                       echo 'Connection error';
                }
                die();
        }        
        
        $req_prep->setFetchMode(PDO::FETCH_CLASS, $class_name);
        $res = $req_prep->fetch();
        
        if (empty($res)){
            return false;
        }
        return $res;
    }
       
    
    
 /*
	public static function delete($primary){
		$table_name=static::$object;
		$primary_key=static::$primary;
		$sql= "DELETE FROM $table_name WHERE $primary_key=:primary_v";
		$req_prep=Model::$pdo->prepare($sql);
		$values = array(
			"primary_v" => $primary,
		);
		try{
			$req_prep->execute($values);
		} catch (PDOException $e) {
			if (Conf::getDebug()) {
				echo $e->getMessage(); // affiche un message d'erreur
			} else {
				echo 'Une erreur est survenue <a href="./index.php"> retour a la page d\'accueil </a>';
			}
			return false;
		}
		return true;
	}

	public static function save($data){
		$table_name=static::$object;
		$sql= "INSERT INTO $table_name(";
		foreach ($data as $cle => $valeur){
			$sql .=" $cle,";
		}
		$sql=rtrim($sql,",").")";
		$sql.=" VALUES (";
		foreach ($data as $cle => $valeur){
			$sql .=" :$cle,";
		}
		$sql=rtrim($sql,",").")";
		$req_prep=Model::$pdo->prepare($sql);
		try{
			$req_prep->execute($data);
		} catch (PDOException $e) {
			if (Conf::getDebug()) {
				echo $e->getMessage(); // affiche un message d'erreur
			}
			return false;
		}
		return true;
	}

	public static function update($data){
		$table_name=static::$object;
		$primary_key=static::$primary;
		$sql= "UPDATE $table_name SET";
		foreach ($data as $cle => $valeur){
			$sql .=" $cle=:$cle,";
		}
		$sql=rtrim($sql,",");
		$sql.=" WHERE $primary_key=:$primary_key";
		$req_prep=Model::$pdo->prepare($sql);
		try{
			$req_prep->execute($data);
		} catch (PDOException $e) {
			if (Conf::getDebug()) {
				echo $e->getMessage(); // affiche un message d'erreur
			} else {
				echo 'Une erreur est survenue <a href="./index.php"> retour a la page d\'accueil </a>';
			}
			return false;
		}
		return true;
	}

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
         * 
         * 8
         */

}
Entity::Init();
?>


