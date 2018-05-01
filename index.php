<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        /*
        echo 'Testing job create';
        echo '<br>';
       
        $dataJob = array('id' => 6,'idemployer' => 2, 'mode'=> 1, 'state'=> 1, 'idlocation'=>1, 'title'=> 'Develop an IDE', 'description'=>'Do not know to describe it', 
            'jobcost'=> 60000, 'dateposted'=> '2018-04-30', datestart=> '2018-06-30', 'dateend'=> '2019-06-30', 'datepostend'=>'2018-05-30', 'availablepercentage'=>50, 'numberapplicants'=>0);
      
        $jobJson = json_encode($dataJob);
       
      
        $url =  'http://localhost/JumpWebService/Logic/Work/jobCreate.php';
        $ch = curl_init($url);
        # Form data string
        # Setting our options
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");  
   
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jobJson);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); 
        $response = curl_exec($ch);
        curl_close($ch);

        
        echo 'Job created';
         echo '<br>';
       
        echo $response;
         echo '<br>';
       */
        
        /*
        echo 'Testing job delete';
        echo '<br>';
        $idJob = 6;
       
      
        $url =  'http://localhost/JumpWebService/Logic/Work/jobDelete.php';
        $ch = curl_init($url);
        # Form data string
        # Setting our options
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $idJob);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); 
        $response = curl_exec($ch);
        curl_close($ch);
        
        echo 'Job deleted';
         echo '<br>';
       
        echo $response;
         echo '<br>';
         */
        
        echo 'Testing job update';
        echo '<br>';
        
        $dataJob = array('id'=> 3, 'idemployer' => 1, 'mode'=> 1);
      
        $jobJson = json_encode($dataJob);
        
      
        
      
        $url =  'http://localhost/JumpWebService/Logic/Work/jobUpdate.php';
        $ch = curl_init($url);
        # Form data string
        # Setting our options
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jobJson);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); 
        $response = curl_exec($ch);
        curl_close($ch);
        
        echo 'Job updated';
         echo '<br>';
       
        echo $response;
         echo '<br>';
        ?>
    </body>
</html>
