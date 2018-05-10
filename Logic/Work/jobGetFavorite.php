<?php

 //require_once '/var/www/html/JumpWebService/Config/conf.php';
require_once '/srv/http/JumpWebService/Config/conf.php'; 
require_once Conf::getRootDir().'Data/DataWork/Job.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    $idUser = $_GET['idUser'];
    $limit = $_GET['limit'];

    $idArray = Job::selectFavoriteJobs($idUser, $limit);
    echo json_encode($idArray);

}
