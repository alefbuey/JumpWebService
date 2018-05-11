<?php
require_once '/var/www/html/JumpWebService/Config/conf.php';
//require_once '/srv/http/JumpWebService/Config/conf.php';
require Conf::getRootDir().'/Data/DataUser/EmployeeJob.php';
require Conf::getRootDir().'/Data/DataUser/UserJump.php';


if ($_SERVER['REQUEST_METHOD'] == 'GET') {


    if (isset($_GET['idemployee']) and isset($_GET['idjob'])) {
        
       

        // Obtener parametro email y password
        $idEmployee = $_GET['idemployee'];
        $idJob = $_GET['idjob'];

        $employeeData = UserJump::selectFields($idEmployee, array("name", "lastname", "rank", "nationality"));
 
        $applicationData = EmployeeJob::selectApplicantInfo($idEmployee, $idJob);
         
             


        $finalData = array("employeeData" => $employeeData, "applicationData" => $applicationData);
        
        echo json_encode($finalData);
        
    }    
}
