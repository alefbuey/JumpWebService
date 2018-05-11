<?php
//require_once '/var/www/html/JumpWebService/Config/conf.php';
require_once '/srv/http/JumpWebService/Config/conf.php';
require_once Conf::getRootDir().'Data/DataWork/Job.php';


if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    $limit = $_GET['limit'];

    $idArray = Job::selectWithLimit($limit);
    echo json_encode($idArray);

}
