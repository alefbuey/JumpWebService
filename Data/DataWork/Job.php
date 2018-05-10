<?php
//require_once '/var/www/html/JumpWebService/Config/conf.php';
require_once '/srv/http/JumpWebService/Config/conf.php';
require_once Conf::getRootDir().'Data/Entity.php';
class Job extends Entity{
   
    private static $id;
    private static $idemployer;
    private static $mode;
    private static $state;
    private static $idlocation;
    private static $title;
    private static $description;
    private static $jobcost;
    private static $dateposted;
    private static $datestart;
    private static $dateend;
    private static $datepostend;
    private static $availablepercentage;
    private static $numberapplicants;
    
    static protected $tableName = 'job';
    static protected $primaryKey = 'id';
    
    public function __construct($id=NULL, $idemployer=NULL, $mode=NULL, $state=NULL, $idlocation=NULL, $title=NULL, $description=NULL, $jobcost=NULL, $dateposted=NULL, $datestart=NULL, $dateend=NULL, $datepostend=NULL, $availablepercentage=NULL, $numberapplicants=NULL) {
       
        if (!is_null($id) && !is_null($idemployer) && !is_null($mode) && !is_null($state) && !is_null($idlocation) && !is_null($title) &&!is_null($description) &&!is_null($jobcost) &&!is_null($dateposted) &&!is_null($datestart) &&!is_null($dateend) &&!is_null($datepostend) &&!is_null($availablepercentage) &&!is_null($numberapplicants)){
  
        
            $this->id = $id;
            $this->idemployer = $idemployer;
            $this->mode = $mode;
            $this->state = $state;
            $this->idlocation = $idlocation;
            $this->title = $title;
            $this->description = $description;
            $this->jobcost = $jobcost;
            $this->dateposted = $dateposted;
            $this->datestart = $datestart;
            $this->dateend = $dateend;
            $this->datepostend = $datepostend;
            $this->availablepercentage = $availablepercentage;
            $this->numberapplicants = $numberapplicants;
        
        }
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
        
    public static function selectMyJobsWithLimit($idUser,$state,$limit){
        $table_name="employeejob";
        $sql="SELECT idJob FROM $table_name WHERE state=:v_state and idEmployee=:v_idemployee LIMIT :v_limit";
        $req_prep=Entity::$pdo->prepare($sql);
        $values = array(
            "v_limit" => $limit,
            "v_state" => $state,
            "v_idemployee" =>$idUser
                    );
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

    public static function selectMyBusinessWithLimit($idUser,$state,$limit){
        $table_name=static::$tableName;
        $sql="SELECT id FROM $table_name WHERE idEmployer=:v_idemployer and state=:v_state LIMIT :v_limit";
        $req_prep=Entity::$pdo->prepare($sql);
        $values = array(
            "v_limit" => $limit,
            "v_state" => $state,
            "v_idemployer" =>$idUser
                    );
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
        
    public static function selectMyBusinessWithLimit2states($idUser,$state1,$state2,$limit){
        $table_name=static::$tableName;
        $sql="SELECT id FROM $table_name WHERE (state=:v_state1 or state=:v_state2) and idEmployer=:v_idemployer LIMIT :v_limit";
        $req_prep=Entity::$pdo->prepare($sql);
        $values = array(
            "v_limit" => $limit,
            "v_state1" => $state1,
            "v_state2" => $state2,
            "v_idemployer" =>$idUser
                    );
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
        
    public static function selectFavoriteJobs($idUser,$limit){
        $table_name="FavoriteJobs";
        $sql="SELECT idJob FROM $table_name WHERE idEmployee=:v_idemployee LIMIT :v_limit";
        $req_prep=Entity::$pdo->prepare($sql);
        $values = array(
            "v_limit" => $limit,
            "v_idemployee" =>$idUser
                    );
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
        
    public static function changeStateOfFavorite($idUser,$idJob,$action){
        $table_name="FavoriteJobs";                
        if($action == 1){    //Insert
            $sql="INSERT INTO $table_name VALUES (:v_idemployee,:v_idjob);";

        }elseif ($action == 2){
            $sql="DELETE FROM $table_name WHERE idEmployee=:v_idemployee and idJob=:v_idjob;";
        }

        $req_prep=Entity::$pdo->prepare($sql);
        $values = array(
            "v_idemployee" =>$idUser,
            "v_idjob" => $idJob
                    );
        try{
                $req_prep->execute($values);
        }catch (PDOException $e) {
                if (Conf::getDebug()) {
                        echo $e->getMessage();
                }else{
                        echo "Connection error. ";
                }
                return false;
        }
        return true;;
    }        
        
    
}

    
