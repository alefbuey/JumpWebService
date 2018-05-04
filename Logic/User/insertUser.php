<?php

require_once '/srv/http/JumpWebService/Config/conf.php';
require Conf::getRootDir().'/Data/DataUser/UserJump.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Decodificando formato Json
    $data = json_decode(file_get_contents("php://input"), true);
     
    //Datos que voy a recibir desde el app
    //name, lastname, birthdate, gender, email, password
    //el resto configurar a null en la base de datos

    $data['nonce'] = UserJump::getnonce($data['email']);

    //La mayoria de los valores son no nulos asi que debo considerar eso para hacer un insert
    //insert con curl 
    //curl -v -H "Content-Type: application/json" -X POST -d '{"name":"Oscar","lastname":"Guarnizo","email":"oscar77@gmail.com","password":"o77","birthdate":"1996-04-21","gender":"M"}' http://localhost/JumpWebService/Logic/User/insertUser.php

    // Insertar usuario
    $retorno = UserJump::save($data);
        
    if ($retorno) {
        // Código de éxito
        print json_encode(
            array(
                'estado' => '1',
                'mensaje' => 'Successful Creation')
        );
    } else {
        // Código de falla
        print json_encode(
            array(
                'estado' => '2',
                'mensaje' => 'Failed Creation')
        );
    }
}


