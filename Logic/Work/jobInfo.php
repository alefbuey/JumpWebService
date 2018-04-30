<?php
require_once '/var/www/html/JumpWebService1/Config/conf.php';
require_once Conf::getRootDir().'Data/DataWork/Job.php';


$job = Job::select('1');
$job1 = Job::select(1);


echo json_encode($job);
echo json_encode($job1);

