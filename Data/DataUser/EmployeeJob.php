<?php

require_once '/var/www/html/JumpWebService/Config/conf.php';
//require_once '/srv/http/JumpWebService/Config/conf.php';
require_once Conf::getRootDir().'Data/Entity.php';

class EmployeeJob extends Entity
{

    static protected $tableName ='EmployeeJob';
    static protected $primaryKey=array(1=>'idemployee', 2 => 'idjob');

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
    
   

    public function selectApplicantInfo($idUser,$idJob){

         
            $table_name="employeejob";
            $sql="SELECT salary, counteroffer, postedreason, counterofferreason FROM $table_name WHERE idemployee=:v_idemployee and idjob=:v_idjob";
            $req_prep=Entity::$pdo->prepare($sql);
            $values = array("v_idemployee" => $idUser,"v_idjob" => $idJob, );
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
            $req_prep->setFetchMode(PDO::FETCH_CLASS, "EmployeeJob");
            return $req_prep->fetch();

        }
        
        public function selectApplicants($idJob) {
            $table_name="employeejob";
            $sql="SELECT idemployee FROM $table_name WHERE idjob=:v_idjob and state = 1";
            $req_prep=Entity::$pdo->prepare($sql);
            $values = array("v_idjob" => $idJob, );
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
        
}
?>
