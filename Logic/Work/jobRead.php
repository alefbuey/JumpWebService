<?php
require_once '/var/www/html/JumpWebService/Config/conf.php';
require_once Conf::getRootDir().'Data/DataWork/Job.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    $idJob = $_GET['id'];

    $job = Job::select($idJob);

    echo json_encode($job);


}
