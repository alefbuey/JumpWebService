<?php

require_once '/var/www/html/JumpWebService/Config/conf.php';
//require_once '/srv/http/JumpWebService/Config/conf.php'; 
require_once Conf::getRootDir().'Data/DataWork/Job.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    $idUser = $_GET['idUser'];
    $state = $_GET['state'];
    $limit = $_GET['limit'];

    $idArray = Job::selectMyJobsWithLimit($idUser, $state, $limit);
    echo json_encode($idArray);

}
