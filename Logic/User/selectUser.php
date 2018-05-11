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
      //  echo print_r($idUser);
        $userjump = UserJump::selectFields($idUser['id'],array("id","name","lastname","email","password"));


        if ($userjump) {
        //  echo "Hola";

                if($userjump->checkPassword($email,$password)){
                    $user["estado"] = "1";
                    $user["user"] = $userjump;
                    echo json_encode($user);
                } else {
                    echo json_encode(
                        array(
                            'estado' => '2',
                            'mensaje' => 'Incorrect Password'
                        )
                    );
                }

        } else {
            // Enviar respuesta de error general
            echo json_encode(
                array(
                    'estado' => '3',
                    'mensaje' => 'No Information Account'
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
