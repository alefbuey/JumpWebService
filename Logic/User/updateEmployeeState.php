<?php
require_once '/var/www/html/JumpWebService/Config/conf.php';
//require_once '/srv/http/JumpWebService/Config/conf.php';
require Conf::getRootDir().'/Data/DataUser/EmployeeJob.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {


  //Para comprobar
  //update curl
  //curl -v -H "Content-Type: application/json" -X POST -d '{"state":2,"idemployee":6,"idjob":1}' http://localhost/JumpWebService/Logic/User/updateEmployeeState.php

  //casos especiales
  //    $body['idLocation'] = 1;
  //    $body['typenationalidentifier'] = 1;


    // Decodificando formato Json
    $data = json_decode(file_get_contents("php://input"), true);


    $newState = EmployeeJob::updateEmployeeState($data);

    if ($newState) {
        // Código de éxito
        print json_encode(
            array(
                'estado' => '1',
                'mensaje' => 'Actualizacion exitosa')
        );
    } else {
        // Código de falla
        print json_encode(
            array(
                'estado' => '2',
                'mensaje' => 'Actualizacion fallida')
        );
    }
}
