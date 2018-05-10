<?php
 require_once '/var/www/html/JumpWebService/Config/conf.php';
 require_once Conf::getRootDir().'Data/DataWork/Job.php';

 require_once Conf::getRootDir().'Data/DataUser/UserJump.php';
 require_once Conf::getRootDir().'Data/DataUser/UserStaff.php';


if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    $idJob = $_GET['id'];


    $job = Job::select($idJob);

    $user = UserJump::selectFields($job->get('idemployer'), array("id", "name", "lastname"));


  //  $userStaff = UserStaff::selectFields($job->get('idemployer'),array("photopath"));


    //$finalData = array("dataJob" => $job, "dataUser" => $user, "dataUserStaff" => $userStaff);
    $finalData = array("dataJob" => $job, "dataUser" => $user);

    echo json_encode($finalData);



}
