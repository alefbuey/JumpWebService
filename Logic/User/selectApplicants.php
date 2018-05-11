<?php

require_once '/var/www/html/JumpWebService/Config/conf.php';
//require_once '/srv/http/JumpWebService/Config/conf.php';
require Conf::getRootDir().'/Data/DataUser/EmployeeJob.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    if (isset($_GET['idjob'])) {

        $idJob = $_GET['idjob'];

        $idArray = EmployeeJob::selectApplicants($idJob);

        echo json_encode($idArray);
    }
}
