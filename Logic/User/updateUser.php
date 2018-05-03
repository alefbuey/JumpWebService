<?php
/**
 * Actualiza una meta especificada por su identificador
 */

require_once '/srv/http/JumpWebService/Config/conf.php';
require Conf::getRootDir().'/Data/DataUser/UserJump.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Decodificando formato Json
    $data = json_decode(file_get_contents("php://input"), true);
    
    //Para comprobar 
    //update curl
    //curl -v -H "Content-Type: application/json" -X POST -d '{"email":"oscar77@gmail.com","name":"Victor"}' http://localhost/JumpWebService/Logic/User/updateUser.php
    
    //casos especiales
    //    $body['idLocation'] = 1;              
    //    $body['typenationalidentifier'] = 1;  
    
    // Actualizar un usuario
    $retorno = UserJump::update($data);

    if ($retorno) {
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


