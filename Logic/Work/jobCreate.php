<?php
require_once '/srv/http/JumpWebService/Config/conf.php';
//require_once '/var/www/html/JumpWebService/Config/conf.php';
require_once Conf::getRootDir().'Data/DataWork/Job.php';
require_once Conf::getRootDir().'Data/DataWork/JobMode.php';
require_once Conf::getRootDir().'Data/DataWork/JobState.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $dataJob = json_decode(file_get_contents('php://input'), true);


    $mode = $dataJob['mode'];
    $idMode = JobMode::getId('mode', $mode)['id'];

    $state = $dataJob['state'];
    $idState = JobState::getId('state',$state)['id'];

    unset($mode);
    unset($state);
    $dataJob['mode'] = $idMode;
    $dataJob['state'] = $idState;

    if(Job::save($dataJob)){
      echo "Succesfully saved";
    }else{
      echo "NOT succesfully saved";
    }
}
