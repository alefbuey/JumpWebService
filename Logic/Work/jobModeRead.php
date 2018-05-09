<?php
require_once '/var/www/html/JumpWebService/Config/conf.php';
require_once Conf::getRootDir().'Data/DataWork/JobMode.php';


if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    $modes = JobMode::selectAll();
    
    echo json_encode($modes);
}
