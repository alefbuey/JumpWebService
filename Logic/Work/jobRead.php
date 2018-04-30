<?php
require_once '/var/www/html/JumpWebService/Config/conf.php';
require_once Conf::getRootDir().'Data/DataWork/Job.php';

$idJob = $_GET['id'];

$job = Job::select($idJob);

echo json_encode($job);

