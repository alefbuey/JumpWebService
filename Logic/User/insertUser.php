<?php
require_once '/var/www/html/JumpWebService/Config/conf.php';

//require_once '/srv/http/JumpWebService/Config/conf.php';
require Conf::getRootDir().'/Data/DataUser/UserJump.php';
require Conf::getRootDir().'/Data/DataUser/UserStaff.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Decodificando formato Json
    $data = json_decode(file_get_contents("php://input"), true);
    //Datos que voy a recibir desde el app
    //name, lastname, birthdate, gender, email, password
    //el resto configurar a null en la base de datos
    $dataUser = $data['user'];
    $dataUser['nonce'] = UserJump::getnonce($dataUser['email']);
    $dataStaff = $data['userStaff'];
    $userjump = UserJump::save($dataUser);
    $id = UserJump::getId('email', $dataUser['email']);
    $dataStaff['idUser'] = $id['id'];
    //$dataStaff['image'] ='Not Info';
    //La mayoria de los valores son no nulos asi que debo considerar eso para hacer un insert
    //insert con curl 
    //curl -v -H "Content-Type: application/json" -X POST -d '{"user":{"name":"oscar","idstate":1,"idlocation":1,"typenationalidentifier":1,"lastname":"guarnizo","email":"oscar","password":"oscar","birthdate":"2018-05-09","gender":"M","nationalidentifier":"No Info","direction":"No Info","nationality":"No Info","availablemoney":"0.00","rank":"0"},"userStaff":{"about":"No Info","cellphone":"No info"}}' http://localhost/JumpWebService/Logic/User/insertUser.php
    // Insertar usuario
    $userStaff = UserStaff::save($dataStaff);
        
    if ($userjump & $userStaff) { 
        // Código de éxito
        echo 'Successful Creation';
    } else {
        // Código de falla
        echo 'Failed Creation';
    }
}