<?php
require_once '/var/www/html/JumpWebService/Config/conf.php';
require_once Conf::getRootDir().'Data/DataWork/Job.php';
require_once Conf::getRootDir().'Data/DataUser/UserJump.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    $idJob = $_GET['id'];
    
    $job = Job::select($idJob);
    
    $user = UserJump::selectFields($job->get('idemployer'), array("id", "name", "lastname"));
  

    $finalData = array("dataJob" => $job, "dataUser" => $user);
    
    echo json_encode($finalData);
    

    
    
}
