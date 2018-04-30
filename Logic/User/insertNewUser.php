<?php

require_once '/srv/http/JumpWebService/Config/conf.php';
require Conf::getRootDir().'/Data/DataUser/UserJump.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Decodificando formato Json
    $body = json_decode(file_get_contents("php://input"), true);
     
   echo '<pre>',print_r($body),'</pre>';
    $body['id'] = 6;
    $body['idstate'] = 1 ;
    $body['nationalidentifier'] = '1718546219';
    $body['birthdate'] = '1996-04-21';
    $body['direction'] = 'Gualundun';
    $body['gender'] = 'M';
    $body['nationality'] = 'Ecuadorian';
    $body['availablemoney'] = 150.00 ;
    $body['nonce'] = 'T7Y8J' ;

    $body['idLocation'] = 1;
    $body['typenationalidentifier'] = 1;  
    
    //La mayoria de los valores son no nulos asi que debo considerar eso para hacer un insert
    //insert con curl 
    //curl -v -H "Content-Type: application/json" -X POST -d '{"name":"Oscar","lastname":"Guarnizo","email":"oscar77@gmail.com","password":"o77"}' http://localhost/JumpWebService/Logic/User/insertNewUser.php


    echo '<pre>',print_r($body),'</pre>';
    // Insertar usuario
    $retorno = UserJump::save($body);
        
    if ($retorno) {
        // Código de éxito
        print json_encode(
            array(
                'estado' => '1',
                'mensaje' => 'Creacion exitosa')
        );
    } else {
        // Código de falla
        print json_encode(
            array(
                'estado' => '2',
                'mensaje' => 'Creacion fallida')
        );
    }
}


