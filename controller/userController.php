<?php
    
    require_once'./model/Users.php';
    
    class UserController { 


        public static function findAllUsers (){
            try {
                $inf = ['Todos'];
                $result = Users::find($inf);
               
            } catch (Exception $err) {
                
                echo$err->getMessage()();
            }
            
            
            return   json_encode(array('status' => $result ?'Sucesso':'Falha', 'dados' => $result ?$result:''));
        }

        public static function findOneUser($id){
            try {
                $inf = ['id_usuarios', $id];
                $result = Users::find($inf);
               
            } catch (Exception $err) {
                
                echo$err->getMessage()();
            }
            
            
            return   json_encode(array('status' => $result ?'Sucesso':'Falha', 'dados' => $result ?$result:''));
        }


        public static function createUsers($data){

            if (empty($data['id_pessoa']) OR empty($data['tipo']) OR empty($data['senha'])) {

				echo  json_encode(array('status' => 'Falha', 'dados' => 'Campos obrigatório sem preencher.'));
            }
            
            $result = Users::create($data);

            echo  json_encode(array('status' => $result ?'Sucesso':'Falha', 'dados' => $result ?$result:'Erro ao inserir Verifique os campos'));
        } 


        public static function updateUsers($data){

            if (empty($data['id_usuarios'])) {

				echo  json_encode(array('status' => 'Falha', 'dados' => 'Usuário não informado'));

				return false;
            }
            
            if (empty($data['senha'])) {
				echo  json_encode(array('status' => 'Falha', 'dados' => 'Senha não informado'));  
                return false;

            }

            if (empty($data['tipo'])) {echo'tipo',$data['tipo'];
                echo  json_encode(array('status' => 'Falha', 'dados' => 'Tipo não informado'));   
                return false;
            }

            if (empty($data)) {

                echo  json_encode(array('status' => 'Falha', 'dados' => 'Dados faltando'));
                return false;
            }

            $result = Users::update($data);
            echo  json_encode(array('status' => $result ?'Sucesso':'Falha', 'dados' => $result ?$result:'Erro ao alterar. Verifique os campos'));

        } 


        public static function deleteUsers($data){

            if (empty($data['id_usuarios'])) {

				echo  json_encode(array('status' => 'Falha', 'dados' => 'Usuario deve ser informado.'));
            }
            if (!empty($data['id_usuarios'])) {

                $result = Users::delete($data);
                echo  json_encode(array('status' => $result ?'Sucesso':'Falha', 'dados' => $result ?$result:'Erro ao excluir. Verifique o usuário.'));
                
            }
        } 



        public static function validateUsers($data){

            $inf = ['cpf',$data['cpf']];
            $cpf = Users::find($inf);
            if(empty($cpf)){
                echo  json_encode(array('status' => $cpf ?'Sucesso':'Falha', 'dados' => $cpf ?$cpf:'CPF não localizado.'));
                exit;
            }

            $inf = ['senha', $data['senha']];
            $result = Users::find($inf);

            echo  json_encode(array('status' => $result ?'Sucesso':'Falha', 'dados' => $result ?$result:'Senha não localizada.'));
            

        }

        
    }