<?php
    require_once'database/connection.php';
    require_once'controller/userController.php';



if (isset($_REQUEST)){
    $url = explode('/', $_REQUEST['url']);
    $method = $_SERVER['REQUEST_METHOD'];
}
header('Content-type: application/json');


if($url[0]==='usuarios'){
   if($method === 'GET'){
        if(!$url[1]){
            try {
                //code...
                $result = UserController::findAllUsers();
                echo $result;
                //var_dump($result);
            } catch (Exception $err) {
                //throw $th;
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