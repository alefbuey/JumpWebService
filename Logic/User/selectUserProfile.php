<?php
//require_once '/var/www/html/JumpWebService/Config/conf.php';
require_once '/srv/http/JumpWebService/Config/conf.php';
require Conf::getRootDir().'/Data/DataUser/UserJump.php';
require Conf::getRootDir().'/Data/DataUser/UserStaff.php';
require Conf::getRootDir().'/Data/DataUser/UserState.php';
require Conf::getRootDir().'/Data/DataUser/NationalIdentifier.php';
require Conf::getRootDir().'/Data/DataLocation/Location.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
   
//PAra hacerlo con POST    
//    $post = json_decode(file_get_contents("php://input"), true);
//    echo '<pre>',$post['email'],'</pre>';

    if (isset($_GET['email'])) {     

        // Obtener parametro email y password
        $email = $_GET['email'];
        
        // Tratar retorno
        $idUser = UserJump::getId('email', $email);
        $userjump1 = UserJump::select($idUser['id']);
        $userStaff = UserStaff::selectFields($idUser['id'],array("about","cellphone"));
        $userState = UserState::selectFields($userjump1->get("idstate"), array("state"));
        $userNI = NationalIdentifierType::selectFields($userjump1->get("typenationalidentifier"), array("description"));
        $userLocation = Location::selectFields($userjump1->get("idlocation"), array("country","city"));
        
        //Designacion de las preferencias        
        $userTags = UserJump::getPreferences($idUser['id']);
        foreach ($userTags as $tag){
            $name = $tag['name'];
            $preferences.= " $name,";
        }
        $preferences=rtrim($preferences,",");
        $userPreferences = array('preferences'=> $preferences);

        
        $fields = array(
            "id",
            "email",
            "name",
            "lastname",
            "nationalIdentifier",
            "birthDate",
            "direction",
            "gender",
            "nationality",
            "availableMoney",
            "rank"
            );
        
        $userjump = UserJump::selectFields($idUser['id'],$fields);

        if ($userjump) {
                
            $user["estado"] = "1";
            $user["user"] = $userjump;
            $user["userStaff"] = $userStaff;
            $user["userState"] = $userState;
            $user["userNIType"] = $userNI;
            $user["userLocation"] = $userLocation;
            $user["userPreferences"] = $userPreferences;
            echo json_encode($user);  
            
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


