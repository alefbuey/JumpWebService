<?php
require_once '/var/www/html/JumpWebService/Config/conf.php';
require_once Conf::getRootDir().'Data/DataWork/Job.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $idJob = file_get_contents('php://input');
    $userjump = Job::delete($idJob);
}
