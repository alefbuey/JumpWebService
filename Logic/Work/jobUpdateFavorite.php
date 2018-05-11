<?php

require_once '/var/www/html/JumpWebService/Config/conf.php';
//require_once '/srv/http/JumpWebService/Config/conf.php'; 
require_once Conf::getRootDir().'Data/DataWork/Job.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {


    if(isset($_GET['idUser']) and isset($_GET['idJob']) and isset($_GET['action'])){
        $idUser = $_GET['idUser'];
        $idJob = $_GET['idJob'];
        $action = $_GET['action']; //1->insert 2->delete
        $idArray = Job::changeStateOfFavorite($idUser, $idJob, $action);
        if($idArray){
            if($action == 1){
                            echo json_encode(
                        array(
                            'estado' => '1',
                            'mensaje' =>  'Added to Favorites'
                        )
                    );
            }elseif ($action == 2) {
                echo json_encode(
                    array(
                        'estado' => '1',
                        'mensaje' =>  'Removed from Favorites'
                    )
                );

            }

        } else {
            echo json_encode(
                        array(
                            'estado' => '2',
                            'mensaje' =>  'Internal error. Can not add to Favorities'
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
