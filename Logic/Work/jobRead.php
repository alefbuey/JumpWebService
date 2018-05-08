<?php
require_once '/var/www/html/JumpWebService/Config/conf.php';
require_once Conf::getRootDir().'Data/DataWork/Job.php';
require_once Conf::getRootDir().'Data/DataUser/UserJump.php';
require_once Conf::getRootDir().'Data/DataUser/UserStaff.php';


if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    $idJob = $_GET['id'];
    
    $job = Job::select($idJob);
    
    $user = UserJump::selectFields($job->get('idemployer'), array("id", "name", "lastname"));
  
    $userStaff = UserStaff::selectFields($job->get('idemployer'),array("image"));
    
    $image = stream_get_contents($userStaff->get("image"));
    
    $image64 = base64_encode($image);
    
    $finalData = array("dataJob" => $job, "dataUser" => $user, "imageProfile" => $image64);
    
    echo json_encode($finalData);
    
    
    
}
