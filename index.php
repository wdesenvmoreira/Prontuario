<?php
    require_once'database/connection.php';
    require_once'controller/userController.php';
    require_once'controller/personController.php';
    require_once'controller/patientController.php';
    require_once'controller/doctorController.php';

    $method ='';

if (isset($_REQUEST)){
    $url = explode('/', $_REQUEST['url']);
    $method = $_SERVER['REQUEST_METHOD'];
}
header('Content-type: application/json');


if($url[0]==='usuarios'){
   if($method === 'GET'){
        if(!$url[1]){
            try {
                
                $result = UserController::findAllUsers();
                echo $result;
                
            } catch (Exception $err) {
                
                echo$err->getMessage()();
            }
        exit;
        }

        if($url[1]){
            try {

                $result = UserController::findOneUser($url[1]);
                echo $result;
            } catch (Exception $err) {
                echo$err->getMessage()();
            }
        exit;
        
        }

    }

    if($url[0]==='usuarios'){
        if($method === 'POST'){
             if($url[1] === 'incluir'){
                 try {
                    $reqbody = file_get_contents('php://input');
                    $jsonbody = json_decode($reqbody, true);

                     $result = UserController::createUsers($jsonbody);
                     echo$result;
                     
                 } catch (Exception $err) {
                     echo$err->getMessage()();
                 }
             exit;
             }


             if($url[1] === 'alterar'){
                try {
                   $reqbody = file_get_contents('php://input');
                   $jsonbody = json_decode($reqbody, true);

                    $result = UserController::updateUsers($jsonbody);
                    echo$result;
                    
                } catch (Exception $err) {
                    echo$err->getMessage()();
                }
            exit;
            }

            if($url[1] === 'deletar'){
                try {
                   $reqbody = file_get_contents('php://input');
                   $jsonbody = json_decode($reqbody, true);

                    $result = UserController::deleteUsers($jsonbody);
                    echo$result;
                    
                } catch (Exception $err) {
                    echo$err->getMessage()();
                }
            exit;
            }

            if($url[1] === 'acessar'){
                try {
                    $reqbody = file_get_contents('php://input');
                    $jsonbody = json_decode($reqbody, true);
 
                     $result = UserController::validateUsers($jsonbody);
                     echo$result;
                     
                 } catch (Exception $err) {
                     echo$err->getMessage()();
                 }
             exit;
            }
            

        }
    }

}

if($url[0]==='pessoas'){
    if($method === 'GET'){
         if(!$url[1]){
             try {
                 $result = PersonController::findAllPerson();
                 echo $result;

             } catch (Exception $err) {

                 echo$err->getMessage()();
             }
         exit;
         }
 
        if($url[1] and $url[2]){
             
             $info=[$url[1], $url[2]];
        
            try {

                $result = PersonController::findOnePerson($info);
                echo $result;
            } catch (Exception $err) {
                echo$err->getMessage()();
            }
            exit;
        
        }
 
     }
 
    if($method === 'POST'){
        if($url[1] === 'incluir'){
            try {
                $reqbody = file_get_contents('php://input');
                $jsonbody = json_decode($reqbody, true);

                $result = PersonController::createPerson($jsonbody);
                echo$result;
                
            } catch (Exception $err) {
                echo$err->getMessage()();
            }
        exit;
        }


        if($url[1] === 'alterar'){
            try {
            $reqbody = file_get_contents('php://input');
            $jsonbody = json_decode($reqbody, true);

                $result = PersonController::updatePerson($jsonbody);
                echo$result;
                
            } catch (Exception $err) {
                echo$err->getMessage()();
            }
        exit;
        }

        if($url[1] === 'deletar'){
            try {
            $reqbody = file_get_contents('php://input');
            $jsonbody = json_decode($reqbody, true);

                $result = PersonController::deletePerson($jsonbody);
                echo$result;
                
            } catch (Exception $err) {
                echo$err->getMessage()();
            }
        exit;
        }

    }
}

if($url[0]==='paciente'){
    if($method === 'GET'){
        if(!$url[1]){
            try {
                $result = PatientController::findAllPatient();
                echo $result;

            } catch (Exception $err) {

                echo$err->getMessage()();
            }
        exit;
        }

        if($url[1] and $url[2]){
            
            $info=[$url[1], $url[2]];
    
            try {

                $result = PatientController::findOnePatient($info);
                echo $result;
            } catch (Exception $err) {
                echo$err->getMessage()();
            }
            exit;
        
        }
    }
    
    if($method === 'POST'){
        if($url[1] === 'incluir'){
            try {
                $reqbody = file_get_contents('php://input');
                $jsonbody = json_decode($reqbody, true);
                
                $result = PatientController::createPatient($jsonbody);
                echo$result;
                
            } catch (Exception $err) {
                echo$err->getMessage()();
            }
        exit;
        }


        if($url[1] === 'alterar'){
            try {
                $reqbody = file_get_contents('php://input');
                $jsonbody = json_decode($reqbody, true);

                $result = PatientController::updatePatient($jsonbody);
                echo$result;
                
            } catch (Exception $err) {
                echo$err->getMessage()();
            }
        exit;
        }

        if($url[1] === 'deletar'){
            try {
                $reqbody = file_get_contents('php://input');
                $jsonbody = json_decode($reqbody, true);

                $result = PatientController::deletePatient($jsonbody);
                echo$result;
                
            } catch (Exception $err) {
                echo$err->getMessage()();
            }
        exit;
        }

    }
}
if($url[0]==='medico'){
    if($method === 'GET'){
        if(count($url)==1){
            try {
                $result = DoctorController::findAllDoctor();
                echo $result;

            } catch (Exception $err) {

                echo$err->getMessage()();
            }
        exit;
        }

        if(count($url)>1){
           
           
           
            try {

                $result = DoctorController::findOneDoctor($url);
                echo $result;
            } catch (Exception $err) {
                echo$err->getMessage()();
            }
            exit;
        
        }
    }
    
    if($method === 'POST'){
        if($url[1] === 'incluir'){
            try {
                $reqbody = file_get_contents('php://input');
                $jsonbody = json_decode($reqbody, true);
                
                $result = DoctorController::createDoctor($jsonbody);
                echo$result;
                
            } catch (Exception $err) {
                echo$err->getMessage()();
            }
        exit;
        }


        if($url[1] === 'alterar'){
            try {
                $reqbody = file_get_contents('php://input');
                $jsonbody = json_decode($reqbody, true);

                $result = DoctorController::updateDoctor($jsonbody);
                echo$result;
                
            } catch (Exception $err) {
                echo$err->getMessage()();
            }
        exit;
        }

        if($url[1] === 'deletar'){
            try {
                $reqbody = file_get_contents('php://input');
                $jsonbody = json_decode($reqbody, true);

                $result = DoctorController::deleteDoctor($jsonbody);
                echo$result;
                
            } catch (Exception $err) {
                echo$err->getMessage()();
            }
        exit;
        }

    }

}
    
