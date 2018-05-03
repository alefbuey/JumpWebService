<?php

require_once '/var/www/html/JumpWebService/Config/conf.php';
require_once Conf::getRootDir().'Data/DataWork/Job.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $dataJob = json_decode(file_get_contents('php://input'), true);

    $retorno = Job::save($dataJob);
}
