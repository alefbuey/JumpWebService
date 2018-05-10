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

	public static function selectWithLimit($limit){
		$table_name=static::$tableName;
		$sql="SELECT id FROM $table_name LIMIT :limit";
		$req_prep=Entity::$pdo->prepare($sql);
		$values = array("limit" => $limit);
		try {
			$req_prep->execute($values);
		} catch (PDOException $e) {
			if (Conf::getDebug()) {
			echo $e->getMessage();
			} else {
			echo 'Connection error';
			}
			die();
			}
		$req_prep->setFetchMode(PDO::FETCH_NUM);
		return $req_prep->fetchAll();
	}

    public static function select($primary_value){
        $table_name=static::$tableName;
        $class_name=ucfirst($table_name);
        $primary_key=static::$primaryKey;
        $sql = "SELECT * FROM $table_name WHERE $primary_key=:primary_v";
        $req_prep=Entity::$pdo->prepare($sql);
        $values = array("primary_v" => $primary_value);
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


    public static function selectFields($primary_value, $fields){
        $table_name=static::$tableName;
        $class_name=ucfirst($table_name);
        $primary_key=static::$primaryKey;
        $sql = "SELECT";
        foreach ($fields as $field){
            $sql.= " $field,";
        }

        $sql=rtrim($sql,",");


        $sql.= " FROM $table_name WHERE $primary_key=:primary_v";

        $req_prep=Entity::$pdo->prepare($sql);
        $values = array("primary_v" => $primary_value);
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



	public static function delete($primary_value){

		$table_name=static::$tableName;
		$primary_key=static::$primaryKey;
		$sql= "DELETE FROM $table_name WHERE $primary_key=:primary_v";
		$req_prep=Entity::$pdo->prepare($sql);
		$values = array("primary_v" => $primary_value);

		try{
                    $req_prep->execute($values);
		} catch (PDOException $e) {
                    if (Conf::getDebug()) {
                            echo $e->getMessage();
                    } else {
                            echo 'Connection error';
                    }
                    return false;
		}
		return true;
	}
//
	public static function save($data){
		$table_name=static::$tableName;

		$sql= "INSERT INTO $table_name(";
		foreach ($data as $clave => $valor){
			$sql .=" $clave,";

		}
		$sql=rtrim($sql,",").")";
		$sql.=" VALUES (";
		foreach ($data as $clave => $valor){
			$sql .=" :$clave,";
		}
		$sql=rtrim($sql,",").")";

		$req_prep=Entity::$pdo->prepare($sql);
		try{
			$req_prep->execute($data);
		} catch (PDOException $e) {
			if (Conf::getDebug()) {
				echo $e->getMessage();
			}else{
				echo "Connection error. ";
			}
			return false;
		}
		return true;
	}


	public static function update($data){
		$table_name=static::$tableName;
		$primary_key=static::$primaryKey;
		$sql= "UPDATE $table_name SET";
		foreach ($data as $cle => $value){
			$sql .=" $cle=:$cle,";
		}
		$sql=rtrim($sql,",");
		$sql.=" WHERE $primary_key=:$primary_key";

		$req_prep= Entity::$pdo->prepare($sql);
		try{
			$req_prep->execute($data);
		} catch (PDOException $e) {
			if (Conf::getDebug()) {
				echo $e->getMessage(); // affiche un message d'erreur
			} else {
				echo 'Connection error';
			}
			return false;
		}
		return true;
	}


        public static function getId($fieldName, $fieldValue){
        $table_name=static::$tableName;
        $sql = "SELECT id FROM $table_name WHERE $fieldName=:field_v";
        $req_prep=Entity::$pdo->prepare($sql);
        $values = array("field_v" => $fieldValue);
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
        $req_prep->setFetchMode(PDO::FETCH_ASSOC);
        $res = $req_prep->fetch();
        if (empty($res)){
            return false;
        }
        return $res;
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



}
Entity::Init();
?>
