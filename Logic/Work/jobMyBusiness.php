<?php

 //require_once '/var/www/html/JumpWebService/Config/conf.php';
require_once '/srv/http/JumpWebService/Config/conf.php'; 
require_once Conf::getRootDir().'Data/DataWork/Job.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    
    if( isset($_GET['idUser']) and isset($_GET['state1']) and isset($_GET['limit'])){
        $idUser = $_GET['idUser'];
        $state1 = $_GET['state1'];
        $limit = $_GET['limit']; 

        if (isset($_GET['state2'])){
            $state2 = $_GET['state2'];
            $idArray = Job::selectMyBusinessWithLimit2states($idUser, $state1, $state2,$limit);        
        } else {
            $idArray = Job::selectMyBusinessWithLimit($idUser, $state1, $limit);
        }

        echo json_encode($idArray);
    } else {
        echo "Internal Error";
    }
    

}
