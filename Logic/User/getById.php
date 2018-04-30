<?php
//require_once '/var/www/html/JumpWebService/Config/conf.php';
require_once '/srv/http/JumpWebService/Config/conf.php';
require Conf::getRootDir().'/Data/DataUser/UserJump.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
   
//PAra hacerlo con POST    
//    $post = json_decode(file_get_contents("php://input"), true);
//    echo '<pre>',$post['email'],'</pre>';

    if (isset($_GET['email']) and isset($_GET['password'])) {     

        // Obtener par�metro idMeta
        $email = $_GET['email'];
        $password = $_GET['password'];
        
        // Tratar retorno
        $retorno = UserJump::select($email);
     
//        echo '<pre>',print_r($retorno),'</pre>';       

       
        if ($retorno) {
                
                if($retorno->checkPassword($email,$password)){
                    $user["estado"] = "1";
                    $user["user"] = $retorno;                 
                    echo json_encode($user);                    
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


