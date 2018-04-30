<?php
require_once '/var/www/html/JumpWebService/Config/conf.php';
require Conf::getRootDir().'/Data/DataUser/UserJump.php';

echo 'Estoy fuera';
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    
//    $post = json_decode(file_get_contents("php://input"), true);
//    echo '<pre>',$post['email'],'</pre>';
    echo 'Estoy en el primer if';
    if (isset($_GET['email']) and isset($_GET['password'])) {
        
            echo 'Estoy en el segundo if';

        // Obtener par�metro idMeta
        $email = $_GET['email'];
        $password = $_GET['password'];
        
        // Tratar retorno
        $retorno = UserJump::select($email);
        
        
//        echo print_r($retorno->get('password'));
//        
//        echo "\n";
        echo '<pre>',print_r($retorno),'</pre>';       
//        echo "\n";
//        try{
//         echo '<pre>',$email,'</pre>';
//         echo '<pre>',$password,'</pre>';
//         echo $retorno->checkPassword($email,$password)? 'true' : 'false';          // ? 'true' : 'false'
//        } catch (Exception $ex) {
//            echo $ex->getMessage();
//        }
//        echo print_r($retorno->hola());
       
        if ($retorno) {
                
                if($retorno->checkPassword($email,$password)){
                    $user["estado"] = "1";
                    $user["user"] = $retorno;
                    // Enviar objeto json de la meta
                    echo '<pre>',print_r($retorno),'</pre>';     
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


