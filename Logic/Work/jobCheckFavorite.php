<?php

require_once '/var/www/html/JumpWebService/Config/conf.php';
//require_once '/srv/http/JumpWebService/Config/conf.php'; 
require_once Conf::getRootDir().'Data/DataWork/Job.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {


    if(isset($_GET['idUser']) and isset($_GET['idJob'])){
        $idUser = $_GET['idUser'];
        $idJob = $_GET['idJob'];
        $idArray = Job::checkFavorite($idUser, $idJob);
        if($idArray){
            echo json_encode(
                array(
                    'estado' => '1',
                    'mensaje' =>  'Is Favorite'
                )
                    );

        } else {
            echo json_encode(
                        array(
                            'estado' => '2',
                            'mensaje' =>  'Not is favorite'
                        )
                    );
        }
    }else{
        echo json_encode(
                    array(
                        'estado' => '3',
                        'mensaje' =>  'Insufficient Arguments'
                    )
                );
    }
   
 }    

