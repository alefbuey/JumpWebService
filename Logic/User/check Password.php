<?php
//require_once '/var/www/html/JumpWebService/Config/conf.php';
require_once '/srv/http/JumpWebService/Config/conf.php';
require Conf::getRootDir().'/Data/DataUser/UserJump.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
   
//PAra hacerlo con POST    
//    $post = json_decode(file_get_contents("php://input"), true);
//    echo '<pre>',$post['email'],'</pre>';

    if (isset($_GET['email']) and isset($_GET['password'])) {     

        // Obtener parametro email y password
        $email = $_GET['email'];
        $password = $_GET['password'];
        
        // Tratar retorno
        $idUser = UserJump::getId('email', $email);
        $userjump = UserJump::select($idUser['id']);
   
       
        if ($userjump) {
                
                if($userjump->checkPassword($email,$password)){
                    echo json_encode(
                        array(
                            'estado' => '1',
                            'mensaje' => 'Contraseña Correcta   '
                        )
                    );                    
                } else {
                    echo json_encode(
                        array(
                            'estado' => '2',
                            'mensaje' => 'Contraseña Incorrecta'
                        )
                    );                    
                }
            
        } else {
            // Enviar respuesta de error general
            echo json_encode(
                array(
                    'estado' => '3',
                    'mensaje' => 'No se obtuvo el registro'
                )
            );
        }

    } else {
        // Enviar respuesta de error
        echo json_encode(
            array(
                'estado' => '4',
                'mensaje' => 'Se necesita un identificador'
            )
        );
    }
}