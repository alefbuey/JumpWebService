<?php
/**
 * Elimina una meta de la base de datos
 * distinguida por su identificador
 */

require_once '/srv/http/JumpWebService/Config/conf.php';
require Conf::getRootDir().'/Data/DataUser/UserJump.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Decodificando formato Json
    $data = json_decode(file_get_contents("php://input"), true);
    
    //Para comprobar 
    //delete curl
    //curl -v -H "Content-Type: application/json" -X POST -d '{"email":"oscar77@gmail.com"}' http://localhost/JumpWebService/Logic/User/deleteUser.php
    
    $idUser = UserJump::getId('email', $data['email']);
    $userjump = UserJump::delete($idUser);

    if ($userjump) {
        print json_encode(
            array(
                'estado' => '1',
                'mensaje' => 'Eliminacion exitosa')
        );
    } else {
        print json_encode(
            array(
                'estado' => '2',
                'mensaje' => 'Eliminacion fallida')
        );
    }
}