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
    public function get($attribute) {
            if (property_exists($this, $attribute)) {
                    return $this->$attribute;
            }
    }

    //setter
            public function set($attribute,$value) {
                    if (property_exists($this, $attribute)) {
                            $this->$attribute=$value;
             }
    }   

}

    
