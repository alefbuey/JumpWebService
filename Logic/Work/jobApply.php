<?php
require_once '/var/www/html/JumpWebService/Config/conf.php';
//require_once '/srv/http/JumpWebService/Config/conf.php';
require_once Conf::getRootDir().'Data/DataUser/EmployeeJob.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $data = json_decode(file_get_contents('php://input'), true);
    if(EmployeeJob::save($data)){
        echo "Succesfully applied";
    }else{
        echo "Error in application process";
    }

}
